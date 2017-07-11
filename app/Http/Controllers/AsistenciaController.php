<?php

namespace App\Http\Controllers;

use Auth;
use \App\Models\Docente;
use \App\Models\Asistencia;	
use \App\Helpers;	
use View;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class AsistenciaController extends BaseController
{

	public function showAsistencia()
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}

		return view('asistencia',['asistencias' => Asistencia::all()]);
	}
	
	public function createAsistencia()
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		$docentes = Helpers::get_list(Docente::all());
		return view('create.asistencia', ['docentes' => $docentes]);
	}
	public function postAsistencia(){
		try {


	        $d = new Asistencia();
	        $d->id_docente = Input::get('id_docente');
	        $d->fecha_asistencia = Input::get('date');
	        $d->id_secretaria = Auth::user()->secretaria->id_secretaria;


	        if($d->save()){
	        	return redirect()->route('asistencia')->with(['status' => 200 , 'message' => "Asistencia registrada correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Asistencia $e) {
			return redirect()->route('asistencia')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-danger']);
		}
	}
	public function posteditAsistencia($id){
		try {


	    	$d = Asistencia::where('id_asistencia', $id)->first();
	        $d->id_docente = Input::get('id_docente');
	        $d->fecha_asistencia = Input::get('date');
	        $d->id_secretaria = Auth::user()->secretaria->id_secretaria;


	        if($d->save()){
	        	return redirect()->route('asistencia')->with(['status' => 200 , 'message' => "Asistencia editada correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Asistencia $e) {
			return redirect()->route('asistencia')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-danger']);
		}
	}

	public function editAsistencia($id)
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
	    $d = Asistencia::where('id_asistencia', $id);
		return view('edit.asistencia', ['asistencia' => $d]);
	}
	public function deleteAsistencia($id){
		try {


	        $d = Asistencia::where('id_asistencia', $id);

	        if($d->delete()){
	        	return redirect()->route('asistencia')->with(['status' => 200 , 'message' => "Asistencia eliminada correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Asistencia $e) {
			return redirect()->route('asistencia')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-danger']);
		}
	}
}