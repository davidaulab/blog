@extends ('layouts.app')



@section ('titulo', 'Listado de articulos')

@section ('contenido')


<table class="table table-striped table-warning">
<tr><th>Titulo</th><th>Fecha</th></tr>
@foreach ($arts as $art) 
    <tr><td><a href="/articulo/{{ $art->id }}" class="text-dark"> {{ $art->titulo }}</a></td><td><a href="/articulo/{{ $art->id }}" class="text-dark"> {{ $art->created_at }}</a></td></tr>
@endforeach
</table>

<p class="text-right mt-4"><a href="{{ route('nuevoart') }}"  class="btn btn-warning">Nuevo artículo</a></p>
@endsection