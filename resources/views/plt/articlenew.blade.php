@extends ('layouts.app')



@section ('title', 'Nuevo artículo')

@section ('content')

<div class="row">
  <div class="col-6">
    <form method="post" enctype='multipart/form-data'>
@csrf
      <div class="card p-4">

      <div class="form-group">
    <label for="title">Título</label>
    <input type="title" class="form-control" id="title" name="title" aria-describedby="titleHelp" placeholder="Título del artículo">
  </div>
  <div class="form-group">
    <label for="text">Contenido</label>
    <textarea class="form-control" id="text" name="text" placeholder="Escribe aquí tu consutal"></textarea>
  </div>
  <div class="form-group">
    <label for="file" style="display:block">Imagen del artículo</label>
    <input type="file" name="file" placeholder="Elige una foto" id="file">
  </div>                 
      
      </div>

      <div class="text-center">
          <br>
        <button type="submit" class="btn btn-warning">Enviar</button>
      </div>
    
    </form>
  </div>
</div>
@endsection
