<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informe Likes</title>
    <link rel="stylesheet" href="C:\xampp\htdocs\semillero\resources\apiTemplate\css\style2.css"/>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="C:\xampp\htdocs\semillero\public\img\logoPDF.png">
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Informe Likes</div>
          <h2 class="name">Ignacio Castrisa</h2>
          <div class="address">Calle falsa 123</div>
          <div class="email"><a href="mailto:ignacastrisa@gmail.com">ignacastrisa@gmail.com</a></div>
        </div>
        <div id="invoice">
          <h1>REPORTE</h1>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">Titular de la opinión</th>
            <th class="total">Total Likes</th>
          </tr>
        </thead>
        <tbody>
            @foreach($opiniones as $opinion)
            @if($opinion->num_likes > 0)
          <tr>
            <td class="no">{{ $opinion->id }}</td>
            <td class="desc2"><h3> {{ $opinion->headline }}</h3></td>
            <td class="unit"> {{ $opinion->num_likes }} </td>
          </tr>
          @endif
          @endforeach
        </tbody>
        
      </table>
      <div id="thanks">Gracias por su confianza</div>
    </main>
    <footer>
      Este reporte fue creado por el departamento de datos de Semillero|laravel
    </footer>
  </body>
</html>