<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	if(Auth::user())
			{
				return redirect()->route('dashboard');
			}
	return view('login');}
);

Route::post('/login', array('uses' => 'Controller@doLogin'));
Route::post('/register', array('uses' => 'Controller@doCreate'));

Route::get('/dashboard', ['middleware' => 'auth',  'as' => 'dashboard', 'uses' => 'DashboardController@showDashboard']);
Route::get('/docentes', ['middleware' => 'auth',  'as' => 'docentes', 'uses' => 'DocentesController@showList']);
Route::get('/asistencia', ['middleware' => 'auth',  'as' => 'asistencia', 'uses' => 'AsistenciaController@showAsistencia']);
Route::get('/cursos', ['middleware' => 'auth',  'as' => 'cursos', 'uses' => 'CursosController@showCursos']);
Route::get('/horario', ['middleware' => 'auth',  'as' => 'horario', 'uses' => 'HorarioController@showHorario']);
Route::get('/documentos', ['middleware' => 'auth',  'as' => 'documentos', 'uses' => 'DocumentosController@showDocumentos']);
Route::get('/cronograma', ['middleware' => 'auth',  'as' => 'documentos', 'uses' => 'CronogramaController@showCronograma']);
Route::get('/documento/{id?}', ['middleware' => 'auth',  'as' => 'documentos', 'uses' => 'DocumentosController@viewDocument']);

//Create Routes
Route::get('/create/docente', ['middleware' => 'auth',  'as' => 'create_docente', 'uses' => 'DocentesController@createDocente']);
Route::get('/create/asistencia', ['middleware' => 'auth',  'as' => 'create_asistencia', 'uses' => 'AsistenciaController@createAsistencia']);
Route::get('/create/curso', ['middleware' => 'auth',  'as' => 'create_curso', 'uses' => 'CursosController@createCurso']);
Route::get('/create/horario', ['middleware' => 'auth',  'as' => 'create_horario', 'uses' => 'HorarioController@createHorario']);
Route::get('/create/documento', ['middleware' => 'auth',  'as' => 'create_documento', 'uses' => 'DocumentosController@createDocumento']);
Route::get('/create/cronograma', ['middleware' => 'auth',  'as' => 'create_documento', 'uses' => 'CronogramaController@createCronograma']);

Route::get('/edit/docente/{id?}', ['middleware' => 'auth',  'as' => 'edit_docente', 'uses' => 'DocentesController@editDocente']);
Route::get('/edit/asistencia/{id?}', ['middleware' => 'auth',  'as' => 'edit_asistencia', 'uses' => 'AsistenciaController@editAsistencia']);
Route::get('/edit/curso/{id?}', ['middleware' => 'auth',  'as' => 'edit_curso', 'uses' => 'CursosController@editCurso']);
Route::get('/edit/horario/{id?}', ['middleware' => 'auth',  'as' => 'edit_horario', 'uses' => 'HorarioController@editHorario']);
Route::get('/edit/documento/{id?}', ['middleware' => 'auth',  'as' => 'edit_documento', 'uses' => 'DocumentosController@editDocumento']);
Route::get('/edit/cronograma/{id?}', ['middleware' => 'auth',  'as' => 'edit_documento', 'uses' => 'CronogramaController@editCronograma']);

//Post Routes


Route::post('/create/docente', ['middleware' => 'auth',  'as' => 'post_docente', 'uses' => 'DocentesController@postDocente']);
Route::post('/create/asistencia', ['middleware' => 'auth',  'as' => 'post_asistencia', 'uses' => 'AsistenciaController@postAsistencia']);
Route::post('/create/curso', ['middleware' => 'auth',  'as' => 'post_curso', 'uses' => 'CursosController@postCurso']);
Route::post('/create/horario', ['middleware' => 'auth',  'as' => 'post_horario', 'uses' => 'HorarioController@postHorario']);
Route::post('/create/documento', ['middleware' => 'auth',  'as' => 'post_documento', 'uses' => 'DocumentosController@postDocumento']);
Route::post('/create/cronograma', ['middleware' => 'auth',  'as' => 'post_documento', 'uses' => 'CronogramaController@postCronograma']);


Route::post('/edit/docente/{id?}', ['middleware' => 'auth',  'as' => 'post_edit_docente', 'uses' => 'DocentesController@editDocente']);
Route::post('/edit/asistencia/{id?}', ['middleware' => 'auth',  'as' => 'post_edit_asistencia', 'uses' => 'AsistenciaController@editAsistencia']);
Route::post('/edit/curso/{id?}', ['middleware' => 'auth',  'as' => 'post_edit_curso', 'uses' => 'CursosController@editCurso']);
Route::post('/edit/horario/{id?}', ['middleware' => 'auth',  'as' => 'post_edit_horario', 'uses' => 'HorarioController@editHorario']);
Route::post('/edit/documento/{id?}', ['middleware' => 'auth',  'as' => 'post_edit_documento', 'uses' => 'DocumentosController@editDocumento']);
Route::post('/edit/cronograma/{id?}', ['middleware' => 'auth',  'as' => 'post_edit_documento', 'uses' => 'CronogramaController@editCronograma']);


Route::post('/delete/docente/{id?}', ['middleware' => 'auth',  'as' => 'delete_docente', 'uses' => 'DocentesController@deleteDocente']);
Route::post('/delete/asistencia/{id?}', ['middleware' => 'auth',  'as' => 'delete_asistencia', 'uses' => 'AsistenciaController@deleteAsistencia']);
Route::post('/delete/curso/{id?}', ['middleware' => 'auth',  'as' => 'delete_curso', 'uses' => 'CursosController@deleteCurso']);
Route::post('/delete/horario/{id?}', ['middleware' => 'auth',  'as' => 'delete_horario', 'uses' => 'HorarioController@deleteHorario']);
Route::post('/delete/documento/{id?}', ['middleware' => 'auth',  'as' => 'delete_documento', 'uses' => 'DocumentosController@deleteDocumento']);
Route::post('/delete/cronograma/{id?}', ['middleware' => 'auth',  'as' => 'delete_documento', 'uses' => 'CronogramaController@deleteCronograma']);

