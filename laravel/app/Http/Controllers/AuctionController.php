<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuctionController extends Controller
{
    //

    public function auction($id) {
       
        $auction = Auction::find($id);

        return view('auction', ['auction' => $auction]);

    }
    
}
