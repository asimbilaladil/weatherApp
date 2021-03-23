<?php

namespace App\Http\Controllers;

use App\Models\WeatherInformation;
use Exception;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('weather');
    }


    public function weatherInformation(){
        try {
            $data  = WeatherInformation::select('*')->get();
            return response()->json([
                'status' => 200,
                'data'   => $data
            ]);
        } catch (Exception $e){
            return response()->json([
                'status' => 400,
                'data'   => []
            ]);
        }

    }
    public function weatherInformationByName($name){
        try {
            $data  = WeatherInformation::select('*')->where([
                'name' => $name
            ])->get();
            return response()->json([
                'status' => 200,
                'data'   => $data
            ]);
        } catch (Exception $e){
            return response()->json([
                'status' => 400,
                'data'   => []
            ]);
        }

    }
}
