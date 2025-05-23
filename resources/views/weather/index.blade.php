 
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Todo List</h1>
            <!-- Your existing todo content -->
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Weather Forecast
                </div>
                <div class="card-body text-center">
                    @if($weather)
                        <h2>{{ $weather['city'] }}</h2>
                        <img src="https://openweathermap.org/img/wn/{{ $weather['icon'] }}@2x.png" alt="Weather icon">
                        <h3>{{ $weather['temp'] }}°C</h3>
                        <p>{{ $weather['description'] }}</p>
                        <p>Humidity: {{ $weather['humidity'] }}%</p>
                        <p>Wind: {{ $weather['wind'] }} m/s</p>
                    @else
                        <p>Weather data unavailable</p>
                    @endif
                    
                    <form id="weatherForm" class="mt-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="cityInput" placeholder="Enter city">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('weatherForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const city = document.getElementById('cityInput').value;
    fetch(`/weather/${city}`)
        .then(response => response.json())
        .then(data => {
            if(data) {
                document.querySelector('.card-body h2').textContent = data.city;
                document.querySelector('.card-body img').src = `https://openweathermap.org/img/wn/${data.icon}@2x.png`;
                document.querySelector('.card-body h3').textContent = `${data.temp}°C`;
                document.querySelector('.card-body p:nth-of-type(1)').textContent = data.description;
                document.querySelector('.card-body p:nth-of-type(2)').textContent = `Humidity: ${data.humidity}%`;
                document.querySelector('.card-body p:nth-of-type(3)').textContent = `Wind: ${data.wind} m/s`;
            }
        });
});
</script>
@endsection
 