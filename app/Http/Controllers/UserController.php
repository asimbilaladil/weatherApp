<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $endpoint = "http://api.openweathermap.org/data/2.5/weather?lat=52.520008&lon=13.404954&appid=bf65d8b174418831a16055a19f50144f";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint, false);
        $output = curl_exec($ch);

        echo json_decode($output);
        curl_close($ch);
       // return view('user');
    }
}
