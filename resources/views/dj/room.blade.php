<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Salas</title>


  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/reticula.css') }}">

  <script type="text/javascript" src="{{ config('rt.host') }}/socket.io/socket.io.js"></script>
  <script type="text/javascript" src="{{ asset('js/jquery-3.1.0.min.js' )}}"></script>
  <script type="text/javascript" src="{{ asset('js/dj.js' )}}"></script>
  <script type="text/javascript" src="{{ asset('js/search.js' )}}"></script>
</head>

<body>
  <input type="hidden" name="node" value="{{ config('rt.host') }}" id="node">
  <input type="hidden" name="id" value="{{ $client_id }}" id="id">
  <section> 
    <header>
      <div class="container">
        <nav class="row between middle">
          <div class="col-3 end">

            <img class="logo3" src="{{ asset('images/fondomulti.png')}} " />  
          </div>
          <div class="col-6 center">
            <img class="logo2" src="{{ asset('images/noche.png') }}" />
          </div>
          <div class="col-3">
            <img class="logo" src="{{ asset('images/logo.png') }}" />
          </div>
        </nav>
      </div>
    </header>


    <input class="input-data" placeholder="Insertar el codigo de la musica" type="search"  name="" id="code">
    <button class= "button-form2" id="add-button" type="submit">Add</button>
    <button class= "button-form2" id="playButton" type="submit">Play</button>      
    <input type="hidden" id="base" value="{{ route('index') }}">

    <div  class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>CODIGO</th>
          </tr>
        </thead>
      </table>
    </div>
    <div  class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
        <div class="opacidad">
          <tbody id="songs">
            
          </tbody>
        </div>
      </table>
    </div>
  </section>
</body>
</html>
