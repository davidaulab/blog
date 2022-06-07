@extends ('layouts.app')



@section ('title', 'Listado de articles')

@section ('content')


<div class="container">
    <h1 class="text-center">Artículos</h1>
      <div class="row">
@foreach ($arts as $art) 

<div class="col-4 p-3">
    <div class="card">
  <img class="card-img-top" src="{{ $art->img }}" alt="Imagen">
  <div class="card-body">
    <h5 class="card-title">{{ $art->title }}</h5>
    <p class="card-text">Creado el {{ $art->created_at }}</p>
  </div>
  <div class="card-body">
    <a href="/article/{{ $art->id }}" class="btn btn-primary">Ver mas..</a>
  </div>
</div>
</div>
    @endforeach
</div>
</div>

@if (Auth::check())
<p class="text-center mt-4"><a href="{{ route('newart') }}"  class="btn btn-warning">Nuevo artículo</a></p>
@endif

@endsection