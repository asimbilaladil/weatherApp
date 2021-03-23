<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class WeatherInformation extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'time',
        'latitude',
        'longitude',
        'temp',
        'pressure',
        'humidity',
        'temp_min',
        'temp_max'
    ];

}

