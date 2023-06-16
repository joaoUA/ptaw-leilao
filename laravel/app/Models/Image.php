<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //use HasFactory;
    protected $table = 'imagem';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pecaArte()
    {
        return $this->belongsTo(ArtPiece::class, 'peca_arte_id');
    }
}
