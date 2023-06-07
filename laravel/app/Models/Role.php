<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //use HasFactory;
    protected $table='cargo';
    protected $primaryKey='id';
    public $timestamps=false;
}
