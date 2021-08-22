<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Email Validation') </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('assets/login/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    @livewireStyles
    <link rel="stylesheet" href="{{asset('assets/login/css/style.css')}}">
</head>
<body>

<div class="main">
    @livewire('counter')
   @yield('contents')

</div>
@livewireScripts
<!-- JS -->
<script src="{{asset('assets/login/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/login/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
