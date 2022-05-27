

@extends ('layouts.app')



@section ('titulo', 'Artículo')

@section ('contenido')

 

  @php

  $arts =  array ();
  array_push ($arts, array (1, 'Titulo artículo 1', 'Este sería el contenido de artículo 1 que no es muy largo'));
  array_push ($arts, array (2, 'Titulo artículo 2', 'Este sería el contenido de artículo 2 que es el siguiente'));
  array_push ($arts, array (3, 'Titulo artículo 3', 'Este sería el contenido de artículo 3 que es la suma de los dos anteriores'));
  array_push ($arts, array (5, 'Titulo artículo 5', 'Este sería el contenido de artículo 5 que sigue la numeración de Fibonacci'));
  array_push ($arts, array (8, 'Titulo artículo 8', 'Este sería el contenido de artículo 8 que ya es el último'));

  $id = 0;
  $fila = -1;
  $id = request()->route('id');

 
    $i = 0;
    
    while (($fila < 0) && ($i < sizeof ($arts))) {
      if ($id == $arts[$i][0]) {
        $fila = $i;
      }
      $i++;
    }
 
    @endphp
  
  @if ($fila >= 0) 
 

<div class="card text-center col-auto" >
  <div class="card-header">
    <h5 class="card-title">{{$arts[$fila][1]}}</h5>
  </div>  
    <div class="card-body"> {{$arts[$fila][2]}}</div>
  
</div>

@else 
  
  <p class="text-danger">No se ha encontrado el artículo</p>
  
@endif
<br>
<a href="{{ route('index') }}" class="btn btn-warning">Volver</a>
  

@endsection


