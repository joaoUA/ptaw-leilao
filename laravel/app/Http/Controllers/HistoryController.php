<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\AuctionItem;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HistoryController extends Controller
{   
    public function showSales(){
        $heading = 'Vendas';
        if(Gate::allows('bidder') || Gate::allows('seller') || Gate::allows('admin')){
            $user = Auth::user();
            $articles = AuctionItem::select(
                'peca_arte.nome as nome', 
                'peca_leilao.preco_final as preco', 
                'leilao.data_hora_final as data'
                )
                ->join('leilao', 'peca_leilao.leilao_id', '=', 'leilao.id')
                ->join('peca_arte', 'peca_arte.peca_leilao_id', '=', 'peca_leilao.id')
                ->where('leilao.vendedor_id', $user->id)
                ->where('peca_leilao.estado_id', 3)
                ->get();
        
            return view('history', [
                'heading' => $heading,
                'articles' => $articles,
            ]);
        }
        else
            return Redirect::to('/');
    }

    public function showPurchases(){
        $heading = 'Compras';
        if(Gate::allows('bidder') || Gate::allows('seller') || Gate::allows('admin')){
            $user = Auth::user();
            $articles = AuctionItem::select(
                'peca_arte.nome as nome', 
                'peca_leilao.preco_final as preco', 
                'leilao.data_hora_final as data'
                )
                ->join('leilao', 'peca_leilao.leilao_id', '=', 'leilao.id')
                ->join('peca_arte', 'peca_arte.peca_leilao_id', '=', 'peca_leilao.id')
                ->where('peca_leilao.comprador_id', $user->id)
                ->where('peca_leilao.estado_id', 3)
                ->get();
        

            return view('history', [
                'heading' => $heading,
                'articles' => $articles,
            ]);
        }
        else
            return Redirect::to('/');
    }
}
