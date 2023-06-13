<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function profile() {

        $user = Auth::user();

        if($user == null)
            return Redirect::to('/');

        if(Gate::denies('bidder') && Gate::denies('seller') && Gate::denies('admin'))
            return Redirect::to('/');

        return view('profile', ['user' => $user]);
    }
}
