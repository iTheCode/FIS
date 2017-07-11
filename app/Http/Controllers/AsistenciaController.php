<?php

namespace App\Http\Controllers;

use Auth;
use \App\Models\Docente;	
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
		return view('asistencia');
	}
	
	public function createAsistencia()
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		$docentes = Docente::all();
		return view('create.asistencia');
	}
}