<?php

namespace App\Console\Commands;

use App\Models\WeatherInformation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;

class getWeatherData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:weatherData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $endpoint[0] = "http://api.openweathermap.org/data/2.5/weather?lat=52.520008&lon=13.404954&appid=bf65d8b174418831a16055a19f50144f";
        $endpoint[1] = "http://api.openweathermap.org/data/2.5/weather?lat=52.515816&lon=13.454293&appid=bf65d8b174418831a16055a19f50144f";

        foreach ($endpoint as $url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_URL, $url);
            $output = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($output);
            WeatherInformation::insert([
                'name' => $data->name,
                'time'=> date('Y-m-d H:i:s', $data->dt),
                'latitude' =>$data->coord->lat,
                'longitude'=>$data->coord->lon,
                'temp'=>$data->main->temp,
                'pressure'=>$data->main->pressure,
                'humidity'=>$data->main->humidity,
                'temp_min'=>$data->main->temp_min,
                'temp_max'=>$data->main->temp_max
            ]);
        }


    }
}
