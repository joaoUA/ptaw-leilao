<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\AuctionItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BidController extends Controller
{

    public function bid(Request $request){
        $data = $request->json()->all();
        
        $bid = $data['bid'];
        $userId = $data['userId'];

        try {
            $auction = Auction::find($data['auctionId']);
            if($auction == null)
                throw new Exception("Leilão não encontrado!");

            $auctionItem = AuctionItem::find($data['auctionItemId']);
            if($auctionItem == null)
                throw new Exception("Item de leilao nao encontrado");

            if( $auction->preco_final == null && $bid <= $auctionItem->preco_inicial)
                throw new Exception("Licitação Inválida");
            if( $bid <= $auctionItem->preco_final)
                throw new Exception("Licitação Inválida");
            if( $auctionItem->comprado_id == $userId)
                throw new Exception("Licitação Inválida");

            if($auctionItem->comprador_id == $userId)
                throw new Exception("Utilizador já tem a maior licitação!");

            $auctionItem->preco_final = $bid;
            $auctionItem->comprador_id = $userId;
            $auctionItem->save();

            return response()->json(['message' => 'Licitação Bem Sucedida!']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function highestBid(Request $request, $auctionItemId){
        $auctionItem = AuctionItem::find($auctionItemId);

        $highestBid = 0;

        if( $auctionItem->preco_final == null)
            $highestBid = $auctionItem->preco_inicial;
        else
            $highestBid = $auctionItem->preco_final;


        return response()->json(['highestBid' => $highestBid]);
    }
}
