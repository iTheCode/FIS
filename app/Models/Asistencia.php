<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
	protected $table = 'asistencia_docente';
	protected $primaryKey = 'id_asistencia';
	
    public function docente(){
        return $this->hasOne('App\Models\Docente', 'id_docente', 'id_docente');
    }
    public function secretaria(){
        return $this->hasOne('App\Models\Secretaria', 'id_secretaria', 'id_secretaria');
    }
}
