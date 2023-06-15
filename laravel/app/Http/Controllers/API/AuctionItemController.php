<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ArtPiece;
use App\Models\Auction;
use App\Models\AuctionItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuctionItemController extends Controller
{
    public function authentication(Request $request, $id) {
        $data = $request->json()->all();

        $auction = Auction::find($id);

        DB::beginTransaction();
        try{

            $validator = Validator::make($data, [
                'status' => 'required|boolean'
            ]);

            if($validator->fails())
                throw new ValidationException($validator);

            $authentication = $data['status'];

            if($auction == null)
                throw new Exception('Não encontrado leilão associado ao id');
            
            $auction->autenticado = $authentication;
            $auctionId = $auction->id;

            $artPieces = ArtPiece::whereHas('pecaLeilao.leilao', function ($query) use ($auctionId) {
                $query->where('id', $auctionId);
            })->get();

            foreach ($artPieces as $artPiece) {
                $artPiece->autenticado = $authentication;
                $artPiece->save();
            }

            DB::commit();
            return response()->json(['message' => 'Leilão autenticado com sucesso!']);

        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json(['message' => $e->validator->errors()  ], 422);
        } catch(Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
