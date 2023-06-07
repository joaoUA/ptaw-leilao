<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionItem extends Model
{
    //use HasFactory;
    protected $table = 'peca_leilao';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function comprador()
    {
        return $this->belongsTo(User::class, 'comprador_id');
    }

    public function leilao()
    {
        return $this->belongsTo(Auction::class, 'leilao_id');
    }

    public function estado()
    {
        return $this->belongsTo(AuctionItemStatus::class, 'estado_id');
    }
}
