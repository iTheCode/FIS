<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
	protected $table = 'documentacion';
	protected $primaryKey = 'id_documentacion';
	

    public function secretaria(){
        return $this->hasOne('App\Models\Secretaria', 'id_secretaria', 'id_secretaria');
    }
}
