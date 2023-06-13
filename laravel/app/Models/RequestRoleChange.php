<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestRoleChange extends Model
{
    //use HasFactory;
    protected $table = 'registo_pedidos_cargo';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function utilizador() {
        return $this->belongsTo(User::class, 'utilizador_id');
    }

    public function cargoDestino() {
        return $this->belongsTo(Cargo::class, 'cargo_destino_id');
    }
}
