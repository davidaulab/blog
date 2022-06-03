

@extends ('layouts.app')



@section ('titulo', 'Artículo')

@section ('contenido')


<div class="card text-center col-auto" >
  <div class="card-header">
    <h5 class="card-title">{{$art->titulo}}</h5>
  </div>  
  <div class="card-body"> {{$art->texto}}</div>
  <img class="card-img-bottom" src="/{{$art->img}}" alt="Imagen">
  
</div>


<br>
<a href="{{ route('index') }}" class="btn btn-warning">Volver</a>
  

@endsection


