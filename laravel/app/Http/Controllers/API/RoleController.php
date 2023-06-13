<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RequestRoleChange;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function requestRole(Request $request,$id, $role) {

        //todo impedir isto caso o utilizador atual já tenha uma pedido por completar na base de dados.

        $roleName = null;

        if($role === 'seller')
            $roleName = 'Vendedor';
        elseif($role === 'admin')
            $roleName = 'Admin';

        $roleId = Role::where('nome', $roleName)->first()->id;


        /*
        $roleChange = new RequestRoleChange();
        $roleChange->utilizador_id = $id;
        $roleChange->cargo_destino_id = $roleId;
        $roleChange->save();
        */

        return response()->json(['message' => $roleId], 200);
    }
}
