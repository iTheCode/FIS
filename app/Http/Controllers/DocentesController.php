<?php

namespace App\Http\Controllers;

use Auth;
use \App\Employee as Employee;
use \App\Models\Docente;
use \App\Helpers;	
use View;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class DocentesController extends BaseController
{

	public function showList()
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		$docentes = Docente::all();
		return view('docentes', ['docentes' => $docentes]);
	}
	public function createDocente()
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		return view('create.docente');
	}

	public function postDocente(){
		try {


	        $d = new Docente();
	        $d->apellidos = Input::get('lastname');
	        $d->nombres = Input::get('name');
	        $d->direccion = Input::get('direction');
	        $d->telefono = Input::get('phone');


	        if($d->save()){
	        	return redirect()->route('docentes')->with(['status' => 200 , 'message' => "Docente creado correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Docente $e) {
			return redirect()->route('docentes')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-success']);
		}
	}

	public function posteditDocente($id){
		try {


	    	$d = Docente::where('id_docente', $id)->first();
	        $d->apellidos = Input::get('lastname');
	        $d->nombres = Input::get('name');
	        $d->direccion = Input::get('direction');
	        $d->telefono = Input::get('phone');

	        if($d->save()){
	        	return redirect()->route('docentes')->with(['status' => 200 , 'message' => "Docente editado correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Docente $e) {
			return redirect()->route('docentes')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-success']);
		}
	}
	public function editDocente($id)
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
	    $d = Docente::where('id_docente', $id);
		return view('edit.docente', ['docente' => $d->first()]);
	}
	public function deleteDocente($id){
		try {


	        $d = Docente::where('id_docente', $id);

	        if($d->delete()){
	        	return redirect()->route('docentes')->with(['status' => 200 , 'message' => "Docente eliminado correctamente.", 'style' => 'alert-success']);
	        }

		} catch (Docente $e) {
			return redirect()->route('docentes')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-danger']);
		}
	}
}