@extends ('layouts.app')



@section ('title', 'Modificar artículo')

@section ('content')




<div class="row">
  <div class="col-6">
    
      <div class="card p-4">

      <div class="cart-title">
   
    <h1>{{ $article->title}}</h1> </div>
    <img src="{{ $article->img}}" alt="imagen">

  <div class="card-body">
    <p>{{ $article->text}}</p>
  </div>

  @if (Auth::check())
  <div class="card-footer row">
  
    <div class="col-md-6 text-center">

            <a href="{{ route ('articles.edit', [$article]) }}" class="btn btn-warning">Modificar</a>
          
      </div>
      <div class="col-md-6 text-center">
        <form method="post"  action="{{ route ('articles.destroy', [$article]) }}">
          @method("delete")
          @csrf
            <button type="submit" class="btn btn-danger">Borrar</button>
          
        </form>
        </div>
    </div>  
      @endif
  
      </div>

  </div>
</div>




@endsection
