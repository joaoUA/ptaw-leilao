<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\RequestRoleChange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class VerificationsController extends Controller
{
    public function verification() {
        if( Gate::denies('admin'))
            return Redirect::to('/');

        $userRequests = RequestRoleChange::whereNull('data_decisao')->get();

        $unverifiedAuctions = Auction::where('estado_id', 1)->get();
        
        return view('verification', [
            'requests' => $userRequests,
            'auctions' => $unverifiedAuctions,
        ]);
    }
}
