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

// route to show the login form
Route::get('logintern', array('uses' => 'LoginteruController@showLogin'));

// route to process the form
Route::post('loginterv', array('uses' => 'LogintervController@doLogin'));


Route::post('/sette/test', 'TestController@store');
Route::post('/profiling/go', 'intervController@store');
Route::post('/sette/test/s', 'TestController@show');

Route::get('new_ticket', 'TicketsController@create');
Route::post('new_ticket', 'TicketsController@store');
Route::get('my_tickets', 'TicketsController@userTickets');
Route::get('tickets/{ticket_id}', 'TicketsController@show');
Route::post('comment', 'CommentsController@postComment');


Auth::routes();

Route::get('/app', 'HomeController@index');

 Route::get('/app', function () {
    $questtests = Questtest::simplePaginate(1);


    return view('app', [
        'questtests' => $questtests
    ]);
});

Route::get('app/(:any)', array('as'=>'test', 'uses'=>'HomeController@view'));


// API endpoints!
Route::group(['prefix' => 'api', 'middleware' => 'auth'], function() {
	Route::resource('categories', 'CategoryController');
	Route::resource('questions', 'QuestionController');
	Route::resource('answers', 'AnswerController');
});



// Admin only routes
// Route::group(['middleware' => 'auth', 'middleware' => 'admin'], function () {
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('tickets', 'TicketsController@index');
    Route::post('close_ticket/{ticket_id}', 'TicketsController@close');

	Route::get('profile', 'IntervController@showprofile');
	Route::get('settings', 'IntervController@showsetting');

	Route::get('intervs', 'IntervController@show');

	Route::get('questions', 'QuestionController@admin');
	Route::any('questions/new', 'QuestionController@new');
	
	Route::get('', 'IntervController@show');
});
