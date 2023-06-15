<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\ArtPiece;
use App\Models\Auction;
use App\Models\AuctionItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class SubmitAuctionController extends Controller
{
    public function __construct(){
        $this->middleware('web');
    }

    public function post(Request $request){
        $data = $request->json()->all();
        $user = Auth::user();

        try {
            DB::beginTransaction();
            $auctionBP = [
                'nome' => $data['name'],
                'collection' => $data['collection'],
                'collectionPrice' => $data['collectionPrice'],
                'vendedorId' => $user->id,
                'estadoId' => 1
            ];
            //VERIFICAR VALIDADE DOS VALORES DO LEILAO
            $auctionValidator = Validator::make($auctionBP, [
                'nome' => 'required|string',
                'vendedorId' => 'required|integer|exists:utilizador,id',
                'collection' => 'required|boolean',
                'collectionPrice' => 'required|integer',
                'estadoId' => 'required|integer|exists:estado_leilao,id'
            ]);
            if ( $auctionValidator->fails())
                throw new ValidationException($auctionValidator);
            
            //CRIAR E ADICIONAR LEILAO À BD
            $auction = new Auction();
            $auction->descricao = $auctionBP['nome'];
            $auction->vendedor_id = $auctionBP['vendedorId'];
            $auction->estado_id = $auctionBP['estadoId'];
            $auction->save();
            
            $items = $data['items'];
            $collection = false;
            $auctionItemId = 0;
            foreach ($items as $item) {
                if(!$collection){
                    $auctionItemBP = [
                        'precoInicial' => $item['precoInicial'],
                        'precoFinal' => null,
                        'pago' => false,
                        'entregue' => false,
                        'dataEntrega' => null,
                        'compradorId' => null,
                        'leilaoId' => $auction->id,
                        'estadoId' => 1
                    ];
                    $auctionItemValidator = Validator::make($auctionItemBP, [
                        'precoInicial' => 'required|integer',
                        'precoFinal' => 'nullable|integer',
                        'pago' => 'required|boolean',
                        'entregue' => 'required|boolean',
                        'dataEntrega' => 'nullable|data',
                        'compradorId' => 'nullable|integer|exists:utilizador,id',
                        'leilaoId' => 'required|integer|exists:leilao,id',
                        'estadoId' => 'required|integer|exists:estado_leilao,id',
                    ]);
                    if ($auctionItemValidator->fails())
                        throw new ValidationException($auctionItemValidator);
                    
                    $auctionItemPrice = $auctionItemBP['precoInicial'];
                    

                    if($auctionBP['collection']){
                        $collection = true;
                        $auctionItemPrice = $auctionBP['collectionPrice'];
                    }
                    $auctionItem = new AuctionItem();
                    $auctionItem->preco_inicial = $auctionItemPrice;
                    $auctionItem->preco_final = $auctionItemBP['precoFinal'];
                    $auctionItem->pago = $auctionItemBP['pago'];
                    $auctionItem->entregue = $auctionItemBP['entregue'];
                    $auctionItem->data_entrega = $auctionItemBP['dataEntrega'];
                    $auctionItem->comprador_id = $auctionItemBP['compradorId'];
                    $auctionItem->estado_id = $auctionItemBP['estadoId'];
                    $auctionItem->leilao_id = $auctionItemBP['leilaoId'];
                    $auctionItem->save();

                    $auctionItemId = $auctionItem->id;
                }
        
                $artPieceBP = [
                    'nome' => $item['nome'],
                    'artista' => $item['artista'],
                    'ano' => $item['ano'],
                    'autenticado' => false,
                    'categoriaId' => 1,
                    'pecaLeilaoId' => $auctionItemId,
                ];
                $artPieceValidator = Validator::make($artPieceBP, [
                    'nome' => 'required|string|max:100',
                    'artista' => 'nullable|string|max:100',
                    'ano' => 'nullable|date',
                    'autenticado' => 'required|boolean',
                    'categoriaId' => 'required|integer|exists:categoria,id',
                    'pecaLeilaoId' => 'required|integer|exists:peca_leilao,id',
                ]);
                if ($artPieceValidator->fails())
                    throw new ValidationException($artPieceValidator);

                
                $artPiece = new ArtPiece();
                $artPiece->nome = $artPieceBP['nome'];
                $artPiece->artista = $artPieceBP['artista'];
                $artPiece->ano = $artPieceBP['ano'];
                $artPiece->autenticado = $artPieceBP['autenticado'];
                $artPiece->categoria_id = $artPieceBP['categoriaId'];
                $artPiece->peca_leilao_id = $artPieceBP['pecaLeilaoId'];
                $artPiece->save();
                    
            }

            DB::commit();
            return response()->json(['message' => 'Leilão criado com sucesso' ], 200);

        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json(['message' => $e->validator->errors()  ], 422);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Ocorreu um erro ao criar o leilão'], 500);
        }
    }

    //GET AUCTION
    public function show(Request $request, $id){
        
        $auction = Auction::select(
            'leilao.id as leilao_id',
            'leilao.descricao',
            'utilizador.id as utilizador_id',
            'utilizador.nome as vendedor_nome',
            'peca_leilao.id as peca_leilao_id',
            'peca_leilao.preco_inicial',
            'peca_arte.id as peca_arte_id',
            'peca_arte.nome as peca_arte_nome',
            'peca_arte.artista',
            'peca_arte.ano',
            'peca_arte.autenticado',
            'categoria.nome as categoria_nome'
        )
        ->join('utilizador', 'leilao.vendedor_id', '=', 'utilizador.id')
        ->join('peca_leilao', 'leilao.id', '=', 'peca_leilao.leilao_id')
        ->join('peca_arte', 'peca_leilao.id', '=', 'peca_arte.peca_leilao_id')
        ->join('categoria', 'peca_arte.categoria_id', '=', 'categoria.id')
        ->where('leilao.id', $id)
        ->get();

        return response()->json(['auction' => $auction]);

    }
}
