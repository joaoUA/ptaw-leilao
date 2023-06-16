<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{

    //todo - permitir que apenas 'guests' possam criar contas (ou seja utilizadores não registados)
    //primeiro incorporar a funcionalidade de sessões
    //public function __construct() { $this->middleware('guest')};

    public function register(Request $request) {
        $data = $request->json()->all();

        try {
            $account = [
                'nome' => $data['name'],
                'apelido' => $data['surname'],
                'data_nascimento' => $data['birthday'],
                'morada' => $data['address'],
                'codigo_postal' => $data['postcode'],
                'cidade' => $data['city'],
                'pais' => $data['country'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'nif' => $data['nif'],
                'iban' => $data['iban'],
                'cargo_id' => 1,
            ];
            
            $validator = Validator::make($account, [
                'nome' => 'required|string|max:100',
                'apelido' => 'required|string|max:100',
                'email' => 'required|email|max:100|unique:utilizador',
                'nif' => 'required|integer|unique:utilizador',
                'iban' => 'required|string|max:50|unique:utilizador',
                'data_nascimento' => 'required|date',
                'morada' => 'required|string|max:100',
                'codigo_postal' => 'required|string|max:50',
                'cidade' => 'required|string|max:50',
                'pais' => 'required|string|max:50',
                'password' => 'required|string|max:100',
                'cargo_id' => 'required|integer',
            ]);
            if ($validator->fails())
                throw new ValidationException($validator);
            
            $user = new User();
            $user->nome = $account['nome'];
            $user->apelido = $account['apelido'];
            $user->email = $account['email'];
            $user->nif = $account['nif'];
            $user->iban = $account['iban'];
            $user->data_nascimento = $account['data_nascimento'];
            $user->morada = $account['morada'];
            $user->codigo_postal = $account['codigo_postal'];
            $user->cidade = $account['cidade'];
            $user->pais = $account['pais'];
            $user->password = $account['password'];
            $user->cargo_id = $account['cargo_id'];

            $user->save();

            return response()->json(['message' => 'Utilizador registado com sucesso'], 200);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->errors()  ], 422);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function editProfile(Request $request) {
        $data = $request->json()->all();
        DB::beginTransaction();
        try{
            $account = [
                'id' => $data['id'],
                'nome' => $data['name'],
                'apelido' => $data['surname'],
                'data_nascimento' => $data['birthday'],
                'morada' => $data['address'],
                'codigo_postal' => $data['postcode'],
                'cidade' => $data['city'],
                'pais' => $data['country'],
                'email' => $data['email'],
                'nif' => $data['nif'],
                'iban' => $data['iban']
            ];

            $validator = Validator::make($account, [
                'id' => 'required|integer',
                'nome' => 'required|string|max:100',
                'apelido' => 'required|string|max:100',
                'email' => 'required|email|max:100|unique:utilizador,email,'.$data['id'],
                'nif' => 'required|integer|unique:utilizador,nif,'.$data['id'],
                'iban' => 'required|string|max:50|unique:utilizador,iban,'.$data['id'],
                'data_nascimento' => 'required|date',
                'morada' => 'required|string|max:100',
                'codigo_postal' => 'required|string|max:50',
                'cidade' => 'required|string|max:50',
                'pais' => 'required|string|max:50',
            ]);
            
            if ($validator->fails())
                throw new ValidationException($validator);

            $user = User::findOrFail($account['id']);
            $user->nome = $account['nome'];
            $user->apelido = $account['apelido'];
            $user->email = $account['email'];
            $user->nif = $account['nif'];
            $user->iban = $account['iban'];
            $user->data_nascimento = $account['data_nascimento'];
            $user->morada = $account['morada'];
            $user->codigo_postal = $account['codigo_postal'];
            $user->cidade = $account['cidade'];
            $user->pais = $account['pais'];

            $user->save();
            DB::commit();
            return response()->json(['message' => 'Dados editados com sucesso'], 200);
            return response()->json(['message' => 'Dados editados com sucesso'], 200);
        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json(['message' => $e->errors()  ], 422);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
