<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //use HasFactory;
    protected $table = 'utilizador';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function cargo()
    {
        return $this->belongsTo(Role::class, 'cargo_id');
    }
}
