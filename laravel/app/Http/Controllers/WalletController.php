<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class WalletController extends Controller
{
    public function wallet()
    {
        if (Gate::denies('bidder') && Gate::denies('seller') && Gate::denies('admin'))
            return Redirect::to('/');

        $user = Auth::user();

        $wallet = Card::where('utilizador_id', $user->id)->first();


        return view('wallet', [
            'card' => $wallet,
            'userId' => $user->id,
            'pageHeading' => "Carteira",
        ]);
    }

    public function registerCard(Request $request)
    {
        $data = $request->json()->all();

        try {

            $hasCard = Card::where('utilizador_id', $data['utilizador_id'])->exists();

            if ($hasCard == true)
                return response()->json(['message' => 'Apenas pode registar um cartão'], 422);

            $cardData = [
                'numero' => $data['id'],
                'nome' => $data['nome'],
                'mes' => $data['mes'],
                'ano' => $data['ano'],
                'cvc' => $data['cvc'],
                'utilizador_id' => $data['utilizador_id']
            ];

            $validator = Validator::make($cardData, [
                'numero' => 'required|string|max:16',
                'nome' => 'required|string|max:30',
                'mes' => 'required|integer|max:12',
                'ano' => 'required|integer',
                'cvc' => 'required|integer|max:999',
            ]);
            if ($validator->fails())
                throw new ValidationException($validator);

            $card = new Card();
            $card->numero = $cardData['numero'];
            $card->nome = $cardData['nome'];
            $card->mes = $cardData['mes'];
            $card->ano = $cardData['ano'];
            $card->cvc = $cardData['cvc'];
            $card->utilizador_id = $cardData['utilizador_id'];

            $card->save();

            return response()->json(['message' => 'Cartão registado com sucesso'], 200);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function deleteCard(Request $request, $id)
    {

        try {
            $card = Card::where('utilizador_id', $id)->first();
            if ($card == null)
                throw new Exception("Não existe cartão");

            $card->delete();

            return response()->json(['message' => 'Cartão eliminado com sucesso'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
