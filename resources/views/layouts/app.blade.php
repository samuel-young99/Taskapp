<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Taskapp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('tasks.index') }}">Task App</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('tasks.index') }}">Tasks</a>
                <a class="nav-link" href="{{ route('tasks.create') }}">Add Task</a>
                <a class="nav-link" href="{{ route('weather.index') }}">Weather</a>
                
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
 
</body>
</html>
