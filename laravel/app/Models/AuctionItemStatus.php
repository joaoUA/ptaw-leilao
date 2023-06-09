<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionItemStatus extends Model
{
    //use HasFactory;
    protected $table='estado_peca';
    protected $primaryKey='id';
    public $timestamps=false;
}
