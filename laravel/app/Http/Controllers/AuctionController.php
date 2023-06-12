<?php

namespace App\Http\Controllers;

use App\Models\Auction;

class AuctionController extends Controller
{
    public function auction($id) {
       
        $auction = Auction::find($id);

        if($auction == null || $auction->pecaleilao == null)
            abort(404, 'Leilão não encontrado!');

        $activeAuction = null;

        foreach ($auction->pecaleilao as $auctionItem) {
            if ($auctionItem->estado->nome == 'Ativo') {
                $activeAuction = $auctionItem;
                break;
            }
        }
        
        if($activeAuction == null){
            echo 'sem itens ativos';
            return;
        }
        else
        {
            return view('auction', [
                'auction' => $auction,
                'activeAuction' => $activeAuction,
                'auctionItemsCount' => count($auction->pecaleilao)
            ]);
        }
    }
}