<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function homeAuctions() {
        //$auctions = Auction::all();
        $auctions = Auction::whereHas('estado', function ($query) {
            $query->where('nome', 'Ativo');
        })->get();
        
        return view('home', ['auctions' => $auctions]);
    }
}
