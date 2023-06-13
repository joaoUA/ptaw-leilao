<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function requestRole(Request $request, $role) {

        $user = Auth::user();

        if( $user == null) {
            return response()->json(['message' => $role], 200);
        }

        return response()->json(['message' => 'Testing Seller!'], 200);
    }
}
