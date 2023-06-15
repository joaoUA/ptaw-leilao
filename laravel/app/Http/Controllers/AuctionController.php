<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class AuctionController extends Controller
{
    public function auction($id) {

        if(Gate::denies('seller') && Gate::denies('bidder') && Gate::denies('admin'))
            return Redirect::to('/');

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
            return Redirect::to('/');
        }

        if($auction->vendedor_id == Auth::user()->id){
            $userValid = false;
        }else{
            $userValid = Card::where('utilizador_id', Auth::user()->id)->exists();
        }
        
        return view('auction', [
            'auction' => $auction,
            'activeAuction' => $activeAuction,
            'auctionItemsCount' => count($auction->pecaleilao),
            'userValid' => $userValid,
            'pageHeading' => $auction->descricao
        ]);
    }
}