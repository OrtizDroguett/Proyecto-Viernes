<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $fillable = [
        'rut',
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'activo',
        'fkCargo',
    ];
    public function cargo()
    {
        //en el segundo parametro asignamos el nombre de la clave foranea, si no lo hacemos laravel segun el nombre
        //crea  la clave foranea, por ejemplo user_id
        return $this->belongsTo(Cargo::class,'fkCargo');
    }
    public function notas()
    {
        return $this->hasMany(nota::class,'fkMedico');
    }
}
