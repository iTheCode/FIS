<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Auth;
use Illuminate\Support\Facades\Input;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    	public function doLogin()
	{
		try {
			 $user_credentials = array(
	            'email' => Input::get('username'),
	            'password' => Input::get('password')
	        );
	        if (Auth::attempt($user_credentials)) {
				return redirect()->route('dashboard');
	        }else{
				if(Auth::validate($user_credentials)){
				     return redirect()->route('/')->with('status', 'No se ha validado al usuario.');
				} else {
				     return redirect()->route('/')->with('status', 'Ha ocurrido un error');
				}
	        	
	        }
			
		} catch (Auth $e) {
			return redirect()->route('login')->with('status', $e->getMessage());
		}
	}

	public function doCreate()
	{
		try {
        	$d = new User();
        	$d->name = Input::get('mail');
        	$d->password = Input::get('password');
        	if($d->save()){
        		$s = new Secretaria();
        		$s->id_user = $d->id;
        		$s->nombres = Input::get('name');
        		if($s->save()){
        			return redirect()->route('dashboard');
        		}
        	}
			
		} catch (User $e) {
			return redirect()->route('login')->with('status', $e->getMessage());
		}
	}
}
