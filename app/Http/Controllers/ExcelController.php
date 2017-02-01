<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\questtest;
use App\question;
use DB;
use Excel;

class ExcelController extends Controller
{
    public function importExport()
	{
		return view('app/questions');
	}
	public function downloadExcel($type)
	{
		$data = Item::get()->toArray();
		return Excel::create('excel_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	public function importExcel()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['weight' => $value->weight, 'description' => $value->description];
				}
				if(!empty($insert)){
					DB::table('items')->insert($insert);
					dd('Insert Record successfully.');
				}
			}
		}
		return back();
	}
}
