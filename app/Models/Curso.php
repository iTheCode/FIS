<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
	protected $table = 'curso';
	protected $primaryKey = 'id_curso';
	

    public function docente(){
        return $this->hasOne('App\Models\Docente', 'id_docente', 'id_docente');
    }
    public function ciclo(){
        return $this->hasOne('App\Models\Ciclo', 'id_ciclo', 'id_ciclo');
    }
}
