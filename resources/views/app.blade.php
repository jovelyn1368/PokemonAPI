<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<!--================== CSRF TOKEN =================== -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>PokeAPI</title>
<link rel="icon" href="{{ URL::asset('img/icon.ico') }}" type="image/x-icon"/>

<!--================== CSS FONT =================== -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <!--==================== VUE LOGIN ====================-->
    <div id="app-2"> 
        <div class="container login-container">
            <login-component></login-component>
        </div>     
    </div>

    @if (Auth::check())
    <script>
        window.Laravel = {!!json_encode([
            'isLoggedin' => true,
            'user' => Auth::user()
        ])!!}
    </script>
    @else
    <script>
        window.Laravel = {!!json_encode([
            'isLoggedin' => false
        ])!!}
    </script>
    @endif
    <!--==================== VUE LOGIN ====================-->

<!--==================== SCRIPT ====================-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

<!--==================== User JS ====================-->
<script src="{{ mix('js/app.js') }}"></script>



</body>
</html>

