<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

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

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                $request->session()->regenerate();
                $request->session()->put('userId', $user->id);
                $request->session()->put('username', $user->nome);


                if ($request->session()->isStarted()) {
                    $request->session()->put('userId', $user->id);
                    $request->session()->put('username', $user->nome);
                    $request->session()->put('userEmail', $user->email);
                    Auth::login($user);
                    return response()->json(['message' => 'Login Sucesso. Sessão Iniciada']);
                } else {
                    return response()->json(['message' => 'Login Sucesso. Erro ao iniciar sessão']);
                }
                return response()->json(['message' => $user]);
            }
            else
                return response()->json(['message' => 'Login Sem Sucesso.'], 401);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->errors()  ], 422);
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        return redirect('/')->with('success', 'You have been successfully logged out.');
    }

}