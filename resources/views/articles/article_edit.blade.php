@extends ('layouts.app')



@section ('title', 'Modificar artículo')

@section ('content')


@if (Auth::check())

<div class="row">
  <div class="col-6">
    <form method="post" enctype='multipart/form-data' action="{{ route ('articles.update', [$article]) }}">
    @method("PUT")  
    @csrf
      <div class="card p-4">

      <div class="form-group">
    <label for="title">Título</label>
    <input type="title" value="{{ $article->title}}" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Título del artículo">
  </div>
  <div class="form-group">
    <label for="text">Contenido</label>
    <textarea class="form-control" id="text" name="text" placeholder="Escribe aquí tu consutal">{{ $article->text}}</textarea>
  </div>
  <div class="form-group">
    <label for="file" style="display:block">Imagen del artículo</label>
    <input type="file" name="file" placeholder="Elige una foto" id="file">

  </div>                 
  <div class="card-body">
        <img src="{{ $article->img}}" alt="imagen" class="col-12">
  </div>  
      </div>


      <div class="text-center">
          <br>
        <button type="submit" class="btn btn-warning">Actualizar</button>
      </div>
    
    </form>
  </div>
</div>

@else
<p class="text-center text-danger">Operación no permitida</p>
@endif

@endsection
