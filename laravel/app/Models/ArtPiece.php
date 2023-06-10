<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtPiece extends Model
{
    //use HasFactory;
    protected $table = 'peca_arte';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $casts = [
        'ano' => 'date',
    ];

    public function categoria()
    {
        return $this->belongsTo(Category::class, 'categoria_id');
    }

    public function pecaLeilao()
    {
        return $this->belongsTo(AuctionItem::class, 'peca_leilao_id');
    }
}
