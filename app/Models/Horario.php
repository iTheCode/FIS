<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
	protected $table = 'horario_clase';
	protected $primaryKey = 'id_horario_clase';
	

    public function docente(){
        return $this->hasOne('App\Models\Docente', 'id_docente', 'id_docente');
    }
    public function curso(){
        return $this->hasOne('App\Models\Curso', 'id_curso', 'id_curso');
    }
}
