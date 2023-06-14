<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HistoryController extends Controller
{
    public function showSales(){
        $heading = 'Vendas';
        if(Gate::allows('bidder') || Gate::allows('seller') || Gate::allows('admin'))
        return view('history', [
            'heading' => $heading,
        ]);
        else
            return Redirect::to('/');
    }

    public function showPurchases(){
        $heading = 'Compras';
        if(Gate::allows('bidder') || Gate::allows('seller') || Gate::allows('admin'))
            return view('history', [
                'heading' => $heading,
        ]);
        else
            return Redirect::to('/');
    }
}
