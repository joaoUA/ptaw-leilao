<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class NewAuctionController extends Controller
{
    public function index() {

        if(Gate::denies('seller'))
            return Redirect::to('/');

        $categories = Category::all();
        return view('newAuction', ['categories' => $categories]);
    }
}
