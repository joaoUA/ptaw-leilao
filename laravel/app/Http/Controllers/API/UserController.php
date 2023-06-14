<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id){

        $user = User::select('nome', 'email', 'nif', 'iban', 'data_nascimento', 'morada', 'codigo_postal', 'cidade', 'pais')->find($id);
        return response()->json($user);
    }
}
