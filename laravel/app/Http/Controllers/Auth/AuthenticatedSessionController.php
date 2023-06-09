<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function login(Request $request) {
        $data = $request->json()->all();

        try {
            $credentials = [
                'email' => $data['email'],
                'password' => $data['password'],
            ];

            $validator = Validator::make($credentials, [
                'email' => 'required|email|max:100',
                'password' => 'required|string|max:100',
            ]);

            if ($validator->fails()) 
                throw new ValidationException($validator);

            if (Auth::attempt($credentials)) 
                return response()->json(['message' => 'Utilizador registado com sucesso']);
            else
                return response()->json(['message' => 'Utilizador registado SEM sucesso'], 401);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->errors()  ], 422);
        }
    }
}