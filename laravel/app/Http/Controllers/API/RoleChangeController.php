<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RequestRoleChange;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleChangeController extends Controller
{
    public function show($id){
        $roleChange = RequestRoleChange::find($id);
        return response()->json($roleChange);
    }

    public function update(Request $request, $id){
        $data = $request->json()->all();
        $decision = $data['decision'];
        
        DB::beginTransaction();
        try {
            $roleChange = RequestRoleChange::find($id);
            
            $roleChange->data_decisao = now();
            $roleChange->concedido = $decision;
            $roleChange->save();

            $user = User::find($roleChange->utilizador_id);
            $user->cargo_id = $roleChange->cargo_destino_id;
            $user->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Ocorreu um erro ao responder ao pedido'], 500);
        }
    }
}
