<?php

namespace App\Http\Controllers;

use Auth;
use \App\Models\Docente;
use \App\Models\Asistencia;	
use \App\Models\Ciclo;	
use \App\Models\Curso;	
use \App\Models\Horario;	
use \App\Models\TipoExamen;
use \App\Models\Cronograma;
use \App\Helpers;	
use View;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class CronogramaController extends BaseController
{

	public function showCronograma()
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		return view('cronograma', ['cronogramas' => Cronograma::all()]);
	}
		
	public function createCronograma()
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		$docentes = Helpers::get_list(Docente::all());
		$cursos = Helpers::get_courses(Curso::all());
		$tipos = Helpers::get_types(TipoExamen::all());
		return view('create.cronograma', ['cursos' => $cursos, 'tipos' => $tipos, 'docentes' => $docentes]);
	}	
	public function postCronograma(){
		try {


	        $d = new Cronograma();
	        $d->id_docente = Input::get('id_docente');
	        $d->id_curso = Input::get('id_curso');
	        $d->id_tipo = Input::get('id_tipo');
	        $d->fecha_clase = Input::get('date');
	        $d->id_secretaria = Auth::user()->secretaria->id_secretaria;


	        if($d->save()){
	        	return redirect()->route('cronograma')->with(['status' => 200 , 'message' => "Examen registrado correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Cronograma $e) {
			return redirect()->route('cronograma')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-danger']);
		}
	}

	public function posteditCronograma($id){
		try {


	    	$d = Cronograma::where('id_cronograma', $id)->first();
	        $d->id_docente = Input::get('id_docente');
	        $d->id_curso = Input::get('id_curso');
	        $d->id_tipo = Input::get('id_tipo');
	        $d->fecha_clase = Input::get('date');
	        $d->id_secretaria = Auth::user()->secretaria->id_secretaria;


	        if($d->save()){
	        	return redirect()->route('cronograma')->with(['status' => 200 , 'message' => "Examen editado correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Cronograma $e) {
			return redirect()->route('cronograma')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-danger']);
		}
	}

	public function editCronograma($id)
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		$docentes = Helpers::get_list(Docente::all());
		$cursos = Helpers::get_courses(Curso::all());
		$tipos = Helpers::get_types(TipoExamen::all());
	    $d = Cronograma::where('id_cronograma', $id);
		return view('edit.cronograma', ['cursos' => $cursos, 'tipos' => $tipos, 'docentes' => $docentes, 'cronograma' => $d->first()]);
	}
	public function deleteCronograma($id){
		try {


	        $d = Cronograma::where('id_cronograma', $id);

	        if($d->delete()){
	        	return redirect()->route('cronograma')->with(['status' => 200 , 'message' => "Cronograma eliminado correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Cronograma $e) {
			return redirect()->route('cronograma')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-danger']);
		}
	}
}