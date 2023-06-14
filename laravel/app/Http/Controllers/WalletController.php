<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class WalletController extends Controller
{
    public function wallet(){
        if(Gate::denies('bidder') && Gate::denies('seller') && Gate::denies('admin'))
            return Redirect::to('/');
            
        $user = Auth::user();
        
        $wallet = Card::where('utilizador_id', $user->id)->first();
            
        
        return view('wallet', [
            'card'=>$wallet,
            'userId'=>$user->id
        ]);
    }

    public function registerCard(Request $request){
        $data = $request->json()->all();

        $hasCard = Card::where('utilizador_id', $data['utilizador_id'])->exists(); 

        if($hasCard==true)
            return response()->json(['message' => 'Apenas pode registar um cartão'], 422);

        try{
            $cardData = [
                'id' => $data['id'],
                'nome' => $data['nome'],
                'mes' => $data['mes'],
                'ano' => $data['ano'],
                'cvc' => $data['cvc'],
                'utilizador_id' => $data['utilizador_id']
            ];

            $validator = Validator::make($cardData,[
                'id' => 'required|integer',
                'nome' => 'required|string|max:30',
                'mes' => 'required|integer|max:12',
                'ano' => 'required|integer',
                'cvc' => 'required|integer|max:999',
            ]);
            if($validator->fails())
                throw new ValidationException($validator);
            
            $card = new Card();
            $card->id = $cardData['id'];
            $card->nome = $cardData['nome'];
            $card->mes = $cardData['mes'];
            $card->ano = $cardData['ano'];
            $card->cvc = $cardData['cvc'];
            $card->utilizador_id = $cardData['utilizador_id'];

            $card->save();

            return response()->json(['message' => 'Cartão registado com sucesso'], 200);
        }catch(ValidationException $e){
            return response()->json(['message' => $e->errors()  ], 422);
        }

        
    }

   
}
    