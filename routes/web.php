<?php
use App\questtest;
use App\user;
use App\pagination;
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
    return view('index');
});


Auth::routes();


// Authenticated users only routes
Route::group(['prefix' => 'app', 'middleware' => 'auth'], function () {

    Route::get('tickets', 'TicketsController@index');
    Route::post('close_ticket/{ticket_id}', 'TicketsController@close');

	Route::get('profile', 'IntervController@showprofile');
	Route::get('settings', 'IntervController@showsetting');


	Route::get('/test', 'TestController@new');
	Route::post('/sessions', 'AnsweredQuestionController@store');

	Route::get('/(:any)', array('as'=>'test', 'uses'=>'HomeController@view'));


	Route::get('new_ticket', 'TicketsController@create');
	Route::post('new_ticket', 'TicketsController@store');

	Route::post('/sette/test', 'TestController@store');

	Route::post('/profiling/go', 'intervController@store');

	Route::post('/candidates', 'intervController@register');

	Route::post('/sette/test/s', 'TestController@show');

	Route::get('my_tickets', 'TicketsController@userTickets');
	Route::get('tickets/{ticket_id}', 'TicketsController@show');
	Route::post('comment', 'CommentsController@postComment');

	Route::get('interviews', 'IntervController@show');
	Route::get('interviews/report', 'ChartsController@chart');


	// Admin only routes
	Route::group(['middleware' => 'auth'], function () {
		Route::get('questions', 'QuestionController@admin');
		Route::post('questions/new', 'QuestionController@new');
		Route::post('questions/import', 'QuestionController@import');

		Route::get('questions/delete/{id}', 'QuestionController@destroy');

		Route::get('categories', 'CategoryController@admin');
		Route::post('categories/new', 'CategoryController@new');
		Route::get('categories/delete/{id}', 'CategoryController@destroy');

		Route::get('users', 'UserController@index');
		Route::get('users/{id}', 'UserController@show');
		Route::post('users/new', 'UserController@store');
		Route::get('users/edit/{id}', 'UserController@edit');
		Route::post('users/{id}', 'UserController@update');
		Route::get('users/profile', 'UserController@profile');
		Route::get('users/delete/{id}', 'UserController@destroy');

		Route::post('profiling/go', 'intervController@store');

		Route::get('importExport', 'ExcelController@importExport');
		Route::get('downloadExcel/{type}', 'ExcelController@downloadExcel');
		Route::get('downloadExcelquestions/{type}', 'ExcelControllerquestions@downloadExcel');
		Route::post('importExcel', 'ExcelController@importExcel');


	});

	Route::get('', 'IntervController@showsetting');
});


// API endpoints!
Route::group(['prefix' => 'api', 'middleware' => 'auth'], function() {
	Route::resource('categories', 'CategoryController');
	Route::resource('questions', 'QuestionController');
	Route::resource('answers', 'AnswerController');
	Route::resource('sessions', 'AnsweredQuestionController');
});

Route::get('/page', function () {
    return view('page');
});


