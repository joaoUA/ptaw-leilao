<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //use HasFactory;
    protected $table = 'cartao';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function utilizador()
    {
        return $this->belongsTo(User::class, 'utilizador_id');
    }
}
