<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RequestRoleChange;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function requestRole(Request $request,$id, $role) {
        try {
            $user = User::find($id);
            
            
            $userActiveRoleChange = RequestRoleChange::where('utilizador_id', $id)
                ->whereNull('data_decisao')
                ->exists();

            if ($userActiveRoleChange)
                throw new ModelNotFoundException();

            $roleName = null;
            if($role === 'seller')
                $roleName = 'Vendedor';
            elseif($role === 'admin')
                $roleName = 'Admin';

            $roleId = Role::where('nome', $roleName)->first()->id;
            
            if($user->cargo_id > $roleId)
                throw new Exception();

            $roleChange = new RequestRoleChange();
            $roleChange->utilizador_id = $id;
            $roleChange->cargo_destino_id = $roleId;
            $roleChange->save();
            return response()->json(['message' => "Sucesso"], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => "Utilizador não pode ter mais do que um pedido ativo"], 502);
        } catch (Exception $e) {
            return response()->json(['message' => "Erro"], 500);
        }

    }
}
