<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index()
    {
        $weather = $this->weatherService->getFormattedWeather();
        return view('weather.index', compact('weather'));
    }

    public function getByCity($city)
    {
        $weather = $this->weatherService->getFormattedWeather($city);
        return response()->json($weather);
    }
}