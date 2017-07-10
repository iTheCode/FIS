<?php

namespace App\Http\Controllers;

use Auth;
use \App\Employee as Employee;
use \App\Models\Authorization;	
use \App\Models\Coverage;	
use \App\Models\PayDocument;
use \App\Models\PayEDocument;		
use \App\Models\Patient;	
use \App\Models\Area as Area;
use View;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class DocumentosController extends BaseController
{

	public function showDocumentos()
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		return view('documentos');
	}
	
}