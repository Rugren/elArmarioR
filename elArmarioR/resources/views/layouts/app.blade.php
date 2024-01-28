<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Online Store')</title>
</head>
<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
    <div class="container">
      {{-- Dejando esta descomentada te deja la opción del idioma en el Login y Register
        Cambiado el route('home.index') }}">Online Store    por    route('product.index')
      <a class="navbar-brand" href="{{ route('home.index') }}">Online Store</a> --}}
      <a class="navbar-brand" href="{{ route('product.index') }}">Online Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      {{-- Metido aquí el @include para poder cambiar de idioma: @include('partials/language_switcher') --}}
      @include('partials/language_switcher')
      

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">

          {{-- Ocultada para que no exista la Home y sea directamente a Products 
            <a class="nav-link active" href="{{ route('home.index') }}">Home</a> --}}

          {{-- <a class="nav-link active" href="{{ route('product.index') }}">Products</a> --}}
          <a class="nav-link active" href="{{ route('product.index') }}">{{__('Home')}}</a>

          <a class="nav-link active" href="{{ route('cart.index') }}">{{__('Cart')}}</a>
          <a class="nav-link active" href="{{ route('home.about') }}">{{__('About')}}</a>


          {{-- FUNCIONA
          Esto es para que si estoy logeado pueda ver el panel de administrador,
          Si estoy sin logearme(y/o no soy "admin") no puedo ver este panel para crear productos. --}}
          @if (Auth::user() && Auth::user()->getRole() == 'admin')
          <a class="nav-link active" href="{{ route('admin.home.index') }}">{{__('Admin Panel')}}</a>
          @endif


          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          @guest
          <a class="nav-link active" href="{{ route('login') }}">{{__('Login')}}</a>
          <a class="nav-link active" href="{{ route('register') }}">{{__('Register')}}</a>
          @else
          <a class="nav-link active" href="{{ route('myaccount.orders') }}">{{__('My Orders')}}</a>
          <form id="logout" action="{{ route('logout') }}" method="POST">
            <a role="button" class="nav-link active"
              onclick="document.getElementById('logout').submit();">{{__('Logout')}}</a>
            @csrf

          {{-- FUNCIONA (Tiene que ir aquí dentro, si lo ponía al principio del panel, cuando me salía con el usuario daba fallos)
          Esto es para que nos diga el Nombre de usuario, su dinero del Balance y el Rol que desempeña. Lo muestra en la web: --}}
          <a class="nav-link active">{{Auth::user()->getName()}} / {{Auth::user()->getRole()}} ({{Auth::user()->getBalance()}}{{__('$')}})</a>

          </form>

          @endguest
        </div>
      </div>
    </div>
  </nav>

  <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
      <h2>@yield('subtitle', 'A Laravel Online Store')</h2>
    </div>
  </header>
  <!-- header -->

  <div class="container my-4">
    @yield('content')
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>
        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
          href="https://twitter.com/danielgarax">
          Daniel Correa
        </a> - <b>Paola Vallejo</b>
      </small>
    </div>
  </div>
  <!-- footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>
</html>
