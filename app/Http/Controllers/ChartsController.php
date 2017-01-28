<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Charts;

class ChartsController extends Controller
{
        public function chart(){
    $chart =Charts::database(User::all(), 'donut', 'highcharts')
                ->title('Analytics')
                ->labels(['First', 'Second', 'Third'])
                ->groupBy('status')
                ->dimensions(1000,500)
                ->responsive(true);

  return view('/admin/report', ['chart' => $chart]);
}

}