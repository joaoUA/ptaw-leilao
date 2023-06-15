<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\AuctionItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TempAuctionController extends Controller
{
    public function launchAuction(Request $request, $id){ 
        
        DB::beginTransaction();
        try{
            $auction = Auction::find($id);
    
            if($auction == null)
                throw new Exception('Leilão não encontrado!');
                
            $auctionItem = AuctionItem::where('leilao_id', $auction->id)
                ->where('pago', false)
                ->orderBy('id', 'asc')
                ->first();
                
            if($auctionItem == null)
                throw new Exception('Erro ao procurar por itens deste leilão!');
            
            $auctionItem->estado_id = 2;
            $auctionItem->save();
    
            $auction->estado_id = 4;
            $auction->save();
    
            DB::commit();
            return response()->json(['message' => 'Leilão publicado com sucesso!'], 200);
        } catch(Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}

