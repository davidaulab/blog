@extends ('layouts.app')



@section ('titulo', 'Listado de articulos')

@section ('contenido')


<table class="table table-striped table-warning">
@foreach ($arts as $art) 
    <tr><td><a href="/articulo/{{ $art[0] }}" class="text-dark"> {{ $art[1] }}</td></tr>
@endforeach
</table>
@endsection