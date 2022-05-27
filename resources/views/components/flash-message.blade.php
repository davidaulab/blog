
@if($message = Session::get("success"))
<div class="alert alert-success" role="alert">
  Se ha enviado tu mensaje!
  <br>{{ $message }}
</div>
@endif

@if($message = Session::get("error"))
<div class="alert alert-failure" role="alert">
  Algo ha ido mal
  <br>{{ $message }}
</div>
@endif