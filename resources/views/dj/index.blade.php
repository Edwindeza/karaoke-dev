<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Secretos</title>
    <link rel="stylesheet"  href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/reticula.css') }}">

    <script type="text/javascript" src="{{ config('rt.host') }}/socket.io/socket.io.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.1.0.min.js' )}}"></script>
    <script type="text/javascript" src="{{ asset('js/dj.js' )}}"></script>
</head>
<body>
    <input type="hidden" name="node" value="{{ config('rt.host') }}" id="node">
    
    <header>
            <div class="container">
                <nav class="row between middle">
                    <div class="col-3">
                        <img class="logo" src="{{ asset('images/logo.png') }}" />
                    </div>
                    <div class="col-6 center">
                        <img class="logo2" src="{{ asset('images/noche.png') }}" />
                    </div>
                    <div class="col-3 end">
                        <img class="logo3" src="{{ asset('images/fondomulti.png') }}" />
                    </div>
                    
                </nav>  
            </div>                      
    </header>

<section class="home">
    <div class="container">
        <div class="row center">
            
            
            <div class="col-12">
                <a href="{{ route('dj.room', 'principal') }}" class="button rojo mediano radius">
                <img src="{{ asset('images/pantalla.png') }}">
                
                <h1 class="texto">Salon Principal</h1>
                <h1 class="texto status">Status</h1></a>
            </div>
            <div class="col-3">
                <a href="{{ route('dj.room', 1) }}" class="button celeste chico radius">
                <img src="{{ asset('images/pantalla.png') }}">
                
                <h1 class="texto">Sala 1</h1>
                <h1 class="texto status">Status</h1></a>
            </div>
            <div class="col-3">
                <a href="{{ route('dj.room', 2) }}" class="button amarillo chico radius">
                <img src="{{ asset('images/pantalla.png') }}">
                
                <h1 class="texto">Sala 2</h1>
                <h1 class="texto status">Status</h1></a>
            </div>
            <div class="col-3">
                <a href="{{ route('dj.room', 3) }}" class="button verde chico radius">
                <img src="{{ asset('images/pantalla.png') }}">
                
                <h1 class="texto">Sala 3</h1>
                <h1 class="texto status">Status</h1></a>
            </div>
            <div class="col-3">
                <a href="{{ route('dj.room', 4) }}" class="button naranja chico radius">
                <img src="{{ asset('images/pantalla.png') }}">
                
                <h1 class="texto">Sala 4</h1>
                <h1 class="texto status">Status</h1></a>
            </div>
            <div class="col-3">
                <a href="{{ route('dj.room', 5) }}" class="button naranja chico radius">
                <img src="{{ asset('images/pantalla.png') }}">
                
                <h1 class="texto">Sala 5</h1>
                <h1 class="texto status">Status</h1></a>
            </div>
            <div class="col-3">
                <a href="{{ route('dj.room', 6) }}" class="button morado chico radius">
                <img src="{{ asset('images/pantalla.png') }}">
                
                <h1 class="texto">Sala 6</h1>
                <h1 class="texto status">Status</h1></a>
            </div>
            <div class="col-3">
                <a href="{{ route('dj.room', 7) }}" class="button amarillo chico radius">
                <img src="{{ asset('images/pantalla.png') }}">
                
                <h1 class="texto">Sala 7</h1>
                <h1 class="texto status">Status</h1></a>
            </div>
            <div class="col-3">
                <a href="{{ route('dj.room', 8) }}" class="button celeste chico radius">
                <img src="{{ asset('images/pantalla.png') }}">
                
                <h1 class="texto">Sala 8</h1>
                <h1 class="texto status">Status</h1></a>
            </div>
            
            
        </div>      
    </div>
            
</section>
<footer>
            <div class="container">
                    
            </div>
            
</footer>
    
    


</body>
</html>