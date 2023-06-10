<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\ArtPiece;
use App\Models\Auction;
use App\Models\AuctionItem;
use App\Models\Category;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;


class SubmitAuctionController extends Controller
{
    public function post(Request $request){
        $data = $request->json()->all();
        
        $auction = new Auction();
        $auction-> id= 5;
        $auction-> descricao = $data['name'];
        $vendedor = User::find(2);
        $auction-> vendedor()->associate($vendedor);
        $estado = Status::find(4);
        $auction-> estado()->associate($estado);
        $auction-> save();
        $items = $data['items'];
        foreach ($items as $item) {
            $auctionItem = new AuctionItem();
            $auctionItem-> id= $item['id'];
            $auctionItem-> preco_inicial= $item['precoInicial'];
            $auctionItem-> pago= false;
            $auctionItem-> entregue= false;
            $auctionItem-> leilao()-> associate(Auction::find(5));
            $auctionItem-> save();
            
            $artPiece = new ArtPiece();
            $artPiece-> id= $item['pecaArteId'];
            $artPiece-> nome= $item['nome'];
            $artPiece-> artista= $item['artista'];
            $artPiece-> ano= '2003-03-23';
            $artPiece-> autenticado= false;
            $artPiece-> categoria()->associate(Category::find(1));
            $artPiece-> pecaLeilao()->associate(AuctionItem::find(1));
            $artPiece-> save();
        };



        return response()->json([ 'message' => $items[0]['id']], 201);
    }
}
