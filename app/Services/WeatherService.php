<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.openweather.key');
        $this->baseUrl = config('services.openweather.url');
    }

    public function getWeather($city = null)
    {
        $city = $city ?? config('services.openweather.default_city');
        
        $response = Http::get($this->baseUrl, [
            'q' => $city,
            'appid' => $this->apiKey,
            'units' => 'metric' // For Celsius
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    public function getFormattedWeather($city = null)
    {
        $weather = $this->getWeather($city);
        
        if (!$weather) {
            return null;
        }

        return [
            'city' => $weather['name'],
            'temp' => round($weather['main']['temp']),
            'description' => ucfirst($weather['weather'][0]['description']),
            'icon' => $weather['weather'][0]['icon'],
            'humidity' => $weather['main']['humidity'],
            'wind' => $weather['wind']['speed']
        ];
    }
}