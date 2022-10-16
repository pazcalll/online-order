<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Online Order</title>

    <link rel="stylesheet" href="{{ asset('css/maicons.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/toastify.min.css') }}">

</head>
<body>

    @include('header')
    
    <div class="page-section wow fadeInUp" style="padding-top:20px">
        
        @include('promo')
        
        <hr>
        
        @include('content')

    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/google-maps.js') }}"></script>

    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>

    <script src="{{ asset('js/theme.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/toastify.js') }}"></script>
  
</body>
</html>