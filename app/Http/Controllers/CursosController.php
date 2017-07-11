<?php

namespace App\Http\Controllers;

use Auth;
use \App\Models\Docente;
use \App\Models\Asistencia;	
use \App\Models\Ciclo;	
use \App\Models\Curso;	
use \App\Helpers;	
use View;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class CursosController extends BaseController
{

	public function showCursos()
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		$cursos = Curso::all();
		return view('cursos', ['cursos' => $cursos]);
	}
	public function createCurso()
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		$docentes = Helpers::get_list(Docente::all());
		$ciclos = Helpers::get_ciclos(Ciclo::all());
		return view('create.curso', ['docentes' => $docentes, 'ciclos' => $ciclos]);
	}
	public function postCurso(){
		try {


	        $d = new Curso();
	        $d->id_docente = Input::get('id_docente');
	        $d->id_ciclo = Input::get('id_ciclo');
	        $d->nombre_curso = Input::get('curso');


	        if($d->save()){
	        	return redirect()->route('cursos')->with(['status' => 200 , 'message' => "Curso agregado correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Curso $e) {
			return redirect()->route('cursos')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-danger']);
		}
	}

	public function posteditCurso($id){
		try {


	    	$d = Curso::where('id_curso', $id)->first();
	        $d->id_docente = Input::get('id_docente');
	        $d->id_ciclo = Input::get('id_ciclo');
	        $d->nombre_curso = Input::get('curso');


	        if($d->save()){
	        	return redirect()->route('cursos')->with(['status' => 200 , 'message' => "Curso editado correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Curso $e) {
			return redirect()->route('cursos')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-danger']);
		}
	}


	public function editCurso($id)
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		$docentes = Helpers::get_list(Docente::all());
		$ciclos = Helpers::get_ciclos(Ciclo::all());
	    $d = Curso::where('id_curso', $id);
		return view('edit.curso', ['docentes' => $docentes, 'ciclos' => $ciclos, 'curso' => $d->first()]);
	}
	public function deleteCurso($id){
		try {


	        $d = Curso::where('id_curso', $id);

	        if($d->delete()){
	        	return redirect()->route('cursos')->with(['status' => 200 , 'message' => "Curso eliminado correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Curso $e) {
			return redirect()->route('cursos')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-danger']);
		}
	}
}