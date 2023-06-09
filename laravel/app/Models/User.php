<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'utilizador';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $casts = [
        'data_nascimento' => 'date',
        'email_verificado_em' => 'datetime',
    ];

    public function cargo()
    {
        return $this->belongsTo(Role::class, 'cargo_id');
    }
}
