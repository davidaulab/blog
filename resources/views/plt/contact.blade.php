@extends ('layouts.app')



@section ('title', 'Contacta con nosotros')

@section ('content')

<div class="row">
  <div class="col-6">
    <form method="post" enctype='multipart/form-data'>
@csrf
      <div class="card p-4">

      <div class="form-group">
    <label for="email">Email </label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu email con nadie.</small>
  </div>
  <div class="form-group">
    <label for="text">Tu consulta</label>
    <input type="text" class="form-control" id="text" name="text" placeholder="Escribe aquí tu consutal">
  </div>
  <div class="form-group">
    <label for="text" style="display:block">Tu imagen</label>
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
