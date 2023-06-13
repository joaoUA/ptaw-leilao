<?php

namespace App\Http\Controllers;

use App\Models\Card;

use Illuminate\Http\Request;

class CardController extends Controller
{
    public function wallet(){
        if(Gate::denies('seller') && Gate::denies('bidder') && Gate::denies('admin'))
            return Redirect::to('/');

        $auction = Auction::find($id);
    }
    
}
