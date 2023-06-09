<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubmitAuctionController extends Controller
{
    public function post(Request $request){
        $data = $request->json()->all();
        echo var_dump($data);
        return response()->json([ 'message' => 'suce'], 201);
    }
}
