
<?php

$arts =  array ();
array_push ($arts, array (1, 'title artículo 1', 'Este sería el content de artículo 1 que no es muy largo'));
array_push ($arts, array (2, 'title artículo 2', 'Este sería el content de artículo 2 que es el siguiente'));
array_push ($arts, array (3, 'title artículo 3', 'Este sería el content de artículo 3 que es la suma de los dos anteriores'));
array_push ($arts, array (5, 'title artículo 5', 'Este sería el content de artículo 5 que sigue la numeración de Fibonacci'));
array_push ($arts, array (8, 'title artículo 8', 'Este sería el content de artículo 8 que ya es el último'));

$id = 0;
$fila = -1;
if (isset ($_GET['id'])) {
  $id = $_GET['id'];

  $i = 0;
  
  while (($fila < 0) && ($i < sizeof ($arts))) {
    if ($id == $arts[$i][0]) {
      $fila = $i;
    }
    $i++;
  }
}

?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>articles</title>
</head>
<body class="m-4 row justify-content-center">
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="/index">Artículos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/contact">Contacto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/about">Sobre nosotros</a>
  </li>

</ul>
<?php if ($fila >= 0) {
 ?> 

<div class="card text-center col-auto" style="width: 18rem; ">
  <div class="card-body">
    <h5 class="card-title"><?= $arts[$fila][1] ?></h5>
    <p class="card-text"><?= $arts[$fila][2] ?></p>
    <a href="/index" class="btn btn-primary">Volver</a>
  </div>
</div>
<?php 
}
else {
  ?>
  <p class="text-danger">No se ha encontrado el artículo</p>
  <?php
}
?>

</body>
</html>