<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //use HasFactory;
    protected $table='estado_leilao';
    protected $primaryKey='id';
    public $timestamps=false;
}
