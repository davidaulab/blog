
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield ('title')</title>
    <style>
     
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

         .linksHeader {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            
        </style>
</head>
<body class="m-4 row justify-content-center">
<div class="flex-center position-ref full-height">
           @if (Route::has('login'))
                <div class="top-right">

                    @if (Auth::check())
                    <form method="post" name="frmLogout" action="{{ url('/logout') }}">
                    @csrf
                    <a href="javascript:frmLogout.submit();"  class="linksHeader">Logout</a>
                    </form>    
                    @else
                        <a href="{{ url('/login') }}" class="linksHeader">Login</a>
                        <a href="{{ url('/register') }}"  class="linksHeader">Register</a>
                    @endif

                </div>
            @endif
            <div class="content">


                <div class="links">          
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="/articles">Artículos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/contacts">Contactos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/contact">Contactar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/about">Sobre nosotros</a>
  </li>

</ul>

</div>
</div>
<div class="container-fluid">
  <x-flash-message/>
    @yield ('content')

</div>
</body>
</html>