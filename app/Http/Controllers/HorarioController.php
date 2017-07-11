<?php

namespace App\Http\Controllers;

use Auth;
use \App\Models\Docente;
use \App\Models\Asistencia;	
use \App\Models\Ciclo;	
use \App\Models\Curso;	
use \App\Models\Horario;	
use \App\Helpers;	
use View;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class HorarioController extends BaseController
{

	public function showHorario()
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		return view('horario', ['horarios' => Horario::all()]);
	}
	public function createHorario()
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		$docentes = Helpers::get_list(Docente::all());
		$cursos = Helpers::get_courses(Curso::all());
		return view('create.horario', ['cursos' => $cursos,'docentes' => $docentes]);
	}	
	public function postHorario(){
		try {


	        $d = new Horario();
	        $d->id_docente = Input::get('id_docente');
	        $d->id_curso = Input::get('id_curso');
	        $d->dia_clase = Input::get('day');
	        $d->hora_clase = Input::get('hour');
	        $d->id_secretaria = Auth::user()->secretaria->id_secretaria;


	        if($d->save()){
	        	return redirect()->route('horario')->with(['status' => 200 , 'message' => "Horario nuevo registrado correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Horario $e) {
			return redirect()->route('horario')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-danger']);
		}
	}
	public function posteditHorario($id){
		try {


	    	$d = Horario::where('id_horario_clase', $id)->first();
	        $d->id_docente = Input::get('id_docente');
	        $d->id_curso = Input::get('id_curso');
	        $d->dia_clase = Input::get('day');
	        $d->hora_clase = Input::get('hour');
	        $d->id_secretaria = Auth::user()->secretaria->id_secretaria;


	        if($d->save()){
	        	return redirect()->route('horario')->with(['status' => 200 , 'message' => "Horario editado correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Horario $e) {
			return redirect()->route('horario')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-danger']);
		}
	}
	public function editHorario($id)
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		$docentes = Helpers::get_list(Docente::all());
		$cursos = Helpers::get_courses(Curso::all());
	    $d = Horario::where('id_horario_clase', $id);
		return view('edit.horario', ['cursos' => $cursos,'docentes' => $docentes,'horario' => $d->first()]);
	}
	public function deleteHorario($id){
		try {


	        $d = Horario::where('id_horario_clase', $id);

	        if($d->delete()){
	        	return redirect()->route('horario')->with(['status' => 200 , 'message' => "Horario eliminado correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Horario $e) {
			return redirect()->route('horario')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-danger']);
		}
	}
}