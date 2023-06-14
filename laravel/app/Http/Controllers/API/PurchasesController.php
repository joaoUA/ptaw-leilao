<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\AuctionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchasesController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function show(){
        $user = Auth::user();

        $auctionItem = AuctionItem::where('comprador_id', $user->id)->get();
    
        return response()->json($auctionItem);
    }
}
