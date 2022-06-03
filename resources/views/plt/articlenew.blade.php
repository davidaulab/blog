@extends ('layouts.app')



@section ('titulo', 'Nuevo artículo')

@section ('contenido')

<div class="row">
  <div class="col-6">
    <form method="post" enctype='multipart/form-data'>
@csrf
      <div class="card p-4">

      <div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="titulo" class="form-control" id="titulo" name="titulo" aria-describedby="tituloHelp" placeholder="Título del artículo">
  </div>
  <div class="form-group">
    <label for="texto">Tu consulta</label>
    <textarea class="form-control" id="texto" name="texto" placeholder="Escribe aquí tu consutal"></textarea>
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
