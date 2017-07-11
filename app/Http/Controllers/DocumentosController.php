<?php

namespace App\Http\Controllers;

use Auth;
use \App\Models\Documento;
use \App\Helpers;	
use View;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DocumentosController extends BaseController
{

	public function showDocumentos()
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		return view('documentos', ['documentos' => Documento::all()]);
	}
	public function createDocumento()
	{
		if (Auth::check()) {
		    $user = Auth::user();
		}
		return view('create.documento');
	}
	public function postDocumento(){
		try {


	    	$d = new Documento();
	        $d->descripcion = Input::get('description');
	        $d->fecha = Input::get('date');
	        $d->url = Input::get('url');
	        $d->id_secretaria = Auth::user()->secretaria->id_secretaria;


	        if($d->save()){
	        	return redirect()->route('documentos')->with(['status' => 200 , 'message' => "El documento ha sido subido con éxito.", 'style' => 'alert-success']);
	        }

		} catch (Horario $e) {
			return redirect()->route('documentos')->with(['status' => 409, 'message' => $e->getMessage(), 'style' => 'alert-danger']);
		}
	}
	public function uploadDocumento(Request $request)
	{

		    $path = public_path().'/uploads/';
            $file = $request->file('file');
            $fileName = Helpers::filerand().".".$file->getClientOriginalExtension();
            $file->move($path, $fileName);
            return '/uploads/'.$fileName;

	}
	public function viewDocument($id){
	    	
	    	$d = Documento::where('id_documentacion', $id)->first();
	   		$file= public_path() . $d->url;
	   		$tmp = explode("/",$file);
	   		$filename= end($tmp);

		    $headers = array(
		              'Content-Type: application/octet-stream',
		            );

	    return Response::download($file, $filename, $headers);
	}
}