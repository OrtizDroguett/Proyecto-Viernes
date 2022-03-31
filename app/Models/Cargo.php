<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cargo',
        'activo',
    ];
    public function medicos()
    {
        return $this->hasMany(Medico::class,'fkCargo');
    }
}
