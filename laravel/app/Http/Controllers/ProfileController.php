<?php

namespace App\Http\Controllers;

use App\Models\RequestRoleChange;
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

        $userSellerRequest = RequestRoleChange::where('utilizador_id', $user->id)
        ->where('cargo_destino_id', 2)
        ->orderBy('id', 'desc')
        ->first();

        $userAdminRequest = RequestRoleChange::where('utilizador_id', $user->id)
        ->where('cargo_destino_id', 3)
        ->orderBy('id', 'desc')
        ->first();

        return view('profile', [
            'pageHeading' => "Perfil",
            'user' => $user,
            'sellerRequest' => $userSellerRequest,
            'adminRequest' => $userAdminRequest
        ]);
    }
}
