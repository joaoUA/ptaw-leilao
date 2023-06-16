<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //use HasFactory;
    protected $table = 'documento';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pecaArte()
    {
        return $this->belongsTo(ArtPiece::class, 'peca_arte_id');
    }
}
