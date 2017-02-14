<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\servers;
use Khill\Lavacharts\Laravel\LavachartsFacade as Lava;
use DB;

class ServerController extends Controller
{
	public function jsondata($link)
	{
		$ch = curl_init();
		// Disable SSL verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL,$link);
		// Execute
		$result=curl_exec($ch);
		// Closing
		curl_close($ch);

		// Will dump a beauty json :3
		$result= json_decode($result, true);
		return $result;
	}


    public function readServer()
    {
    	$url= "http://www.nageshkatna.com/json/dummy";
    	

		$result= $this->jsondata($url);

		$server= servers::truncate();
		
		for($i=0;$i<count($result);$i++){

			$server = Servers::create([
				'value' => $result[$i]['value'],
				'date' => $result[$i]['date'],
			]);
		}

		$max = DB::select('select date, MAX(value) from servers');
		$min = DB::select('select date, MIN(value) from servers');
		

		$array= array_column($result,'value');
		$minval= min($array);
		$maxval= max($array);
		$average= array_sum($array)/count($array);



		$linevalue= Lava::DataTable();

		$data= servers::select("date as 0","value as 1")->get()->toArray();

		$linevalue->addStringColumn('Date`')
				->addNumberColumn('Value')
				->addRows($data);

		$chart['server_data']= Lava::LineChart('server_data',$linevalue);

		return view('chart',$chart)->with('min',$min)->with('max',$max)
									->with('average',$average)->with('minval',$minval)->with('maxval',$maxval);
    }
}
