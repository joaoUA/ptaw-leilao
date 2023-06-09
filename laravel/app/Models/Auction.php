<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    //use HasFactory;
    protected $table = 'leilao';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }

    public function pecaLeilao()
    {
        return $this->hasMany(AuctionItem::class, 'leilao_id');
    }

    public function estado()
    {
        return $this->belongsTo(Status::class, 'estado_id');
    }
}
