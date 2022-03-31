<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nota extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'estadoPaciente',
        'fkPaciente',
        'fkMedico',
        'activo',
    ];
    public function medico()
    {
        //en el segundo parametro asignamos el nombre de la clave foranea, si no lo hacemos laravel segun el nombre
        //crea  la clave foranea, por ejemplo user_id
        return $this->belongsTo(Medico::class,'fkMedico');
    }
    public function paciente()
    {
        //en el segundo parametro asignamos el nombre de la clave foranea, si no lo hacemos laravel segun el nombre
        //crea  la clave foranea, por ejemplo user_id
        return $this->belongsTo(Paciente::class,'fkPaciente');
    }
}
