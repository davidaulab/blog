@extends ('layouts.app')



@section ('title', 'Listado de articulos')

@section ('content')


<div class="container">
    <h1 class="text-center">Artículos</h1>
      <div class="row">
@foreach ($articles as $article) 

<div class="col-4 p-3">
    <div class="card">
  <img class="card-img-top" src="{{ $article->img }}" alt="Imagen del artículo">
  <div class="card-body">
    <h5 class="card-title">{{ $article->title }}</h5>
    <p class="card-text">Creado el {{ $article->created_at }}</p>
  </div>
  <div class="card-body">
    
  
    <a class="btn btn-success" href="{{route("articles.show",[$article])}}">
                                Ver más
                            </a>


  </div>
</div>
</div>
    @endforeach
</div>
</div>

@if (Auth::check())
<p class="text-center mt-4"><a href="{{ route('articles.create') }}"  class="btn btn-warning">Nuevo artículo</a></p>
@endif

@endsection