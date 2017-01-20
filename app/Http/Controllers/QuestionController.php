<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
 * Display a listing of the resource
 *
 * @return Response
 */
public function index()
{
    return array(
      1 => "John",
      2 => "Mary",
      3 => "Steven"
    );
}
}
