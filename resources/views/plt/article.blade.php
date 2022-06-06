

@extends ('layouts.app')



@section ('title', 'Artículo')

@section ('content')


<div class="card text-center col-auto" >
  <div class="card-header">
    <h5 class="card-title">{{$article->title}}</h5>
  </div>  
  <div class="card-body"> {{$article->text}}</div>
  <img class="card-img-bottom" src="{{$article->img}}" alt="Imagen">
  
</div>


<br>
<a href="{{ route('index') }}" class="btn btn-warning">Volver</a>
  

@endsection


