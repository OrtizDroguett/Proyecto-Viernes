<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rut',
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'activo',
        'fkPaciente',
    ];
    public function notas()
    {
        return $this->hasMany(nota::class,'fkPaciente');
    }
}
