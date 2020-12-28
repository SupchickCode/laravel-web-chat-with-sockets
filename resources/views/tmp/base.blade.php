<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- ADD CSRF TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- ADD BOOTSTRAP 5.0.0 BETA --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    {{-- ADD CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('static/css/style.css') }}">
   
    <title>@yield('title')</title>
</head>

<body>
    <div class="container">

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        
        @yield('content')
        @yield ('chat')
    </div>
    
    <!-- JavaScript Bundle with Popper.js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    <!-- ADD AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <!-- ADD JS -->
    <script rel="stylesheet" src="{{ URL::asset('static/js/ajax.js') }}"></script>
    <!-- ADD APP.JS -->
    <script src=" {{ URL::asset('js/app.js') }} "></script>
</body>

</html>
