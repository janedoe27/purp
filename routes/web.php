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


Route::get('admin/index', 'IntervController@show');

Route::get('admin/index', function () {
     $Users =User::Paginate(1);

    return view('admin/index', [
        'Users' => $Users
    ]);
});

Route::get('admin/profiling', function () {
    return view('admin/profiling');
});

Route::get('admin/sette', function () {
    return view('admin/sette');
});


Route::get('admin/intervs', 'IntervController@show');

Route::get('admin/intervs', function () {
     $Intervs =Interv::Paginate(2);

    return view('/admin/intervs', [
        'Intervs' => $Intervs
    ]);
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


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('tickets', 'TicketsController@index');
    Route::post('close_ticket/{ticket_id}', 'TicketsController@close');
});

Auth::routes();

Route::get('/app', 'HomeController@index');

 Route::get('/app', function () {
    $questtests = Questtest::simplePaginate(1);


    return view('app', [
        'questtests' => $questtests
    ]);
});

Route::get('app/(:any)', array('as'=>'test', 'uses'=>'HomeController@view'));

