
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield ('titulo')</title>
</head>
<body class="m-4 row justify-content-center">

<ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="/articulo">Artículos</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/contactos">Contactos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/contactar">Contactar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/acerca">Sobre nosotros</a>
  </li>

</ul>


<div class="container-fluid">
  <x-flash-message/>
    @yield ('contenido')

</div>
</body>
</html>