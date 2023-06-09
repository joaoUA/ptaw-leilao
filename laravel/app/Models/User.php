<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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
