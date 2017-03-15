<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\user;
use App\question;
use DB;
use Excel;

class ExcelController extends Controller
{
    public function importExport()
	{
		return view('users/show');
	}
	public function downloadExcel($type)
	{
		$data = user::get()->toArray();
		return Excel::create('excel_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}

	public function downloadExcelquestions($type)
	{
		$data = questions::get()->toArray();
		return Excel::create('questions', function($excel) use ($data) {
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
					$insert[] = ['id' => $value->id,'first_name' => $value->first_name, 'last_name' => $value->last_name,'email' => $value->email,
					'is_admin' => $value->is_admin,'is_staff' => $value->is_staff,'role' => $value->role,'password' => $value->password,'_token' => $value->_token,];
				}
				if(!empty($insert)){
					DB::table('users')->insert($insert);
					dd('Insert Record successfully.');
				}
			}
		}
		return back();
	}

	public function importExcelQuestions()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['id' => $value->id,'description' => $value->description, 'weight' => $value->weight,'cartegory_id' => $value->cartegory_id,];
				}
				if(!empty($insert)){
					DB::table('questions')->insert($insert);
					dd('Insert Record successfully.');
				}
			}
		}
		return back();
	}

// 	public function getImport(){
// return view ('excel.ImportIntervs');
// 	}
// 	public function PostImport(){
//        Excel::load(Input::file('intervs'),function($reader){
// 		   $reader->each(function($sheet){
// 			   Intervs::firstOrCreate($sheet->toArray());
// 		   });
// 	   });
// 	   return back();
// 	}

	}
	
