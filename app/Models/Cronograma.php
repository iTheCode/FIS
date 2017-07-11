<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
	protected $table = 'cronograma';
    protected $primaryKey = 'id_cronograma';
    

    public function docente(){
        return $this->hasOne('App\Models\Docente', 'id_docente', 'id_docente');
    }
    public function curso(){
        return $this->hasOne('App\Models\Curso', 'id_curso', 'id_curso');
    }
    public function tipo(){
        return $this->hasOne('App\Models\TipoExamen', 'id_tipo', 'id_tipo');
    }
}
