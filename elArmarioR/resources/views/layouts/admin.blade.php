<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Admin - elArmarioR')</title>
</head>

<body>
  <div class="row g-0">
    <!-- sidebar -->
    <div class="p-3 col fixed text-white bg-dark">
      <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
        <span class="fs-4">{{__('Admin Panel')}}</span>
      </a>

      {{-- Metido aquí el @include para poder cambiar de idioma: @include('partials/language_switcher') --}}
      @include('partials/language_switcher')

      <hr />
      <ul class="nav flex-column">
        <li><a href="{{ route('admin.home.index') }}" class="nav-link text-white">- {{__('Admin - Home')}}</a></li>
        <li><a href="{{ route('admin.product.index') }}" class="nav-link text-white">- {{__('Admin - Products')}}</a></li>
        <li>
          <a href="{{ route('product.index') }}" class="mt-2 btn bg-primary text-white">{{__('See products')}} - {{__('Shop')}}</a>
        </li>
        <li>
          <a href="{{ route('home.index') }}" class="mt-2 btn bg-primary text-white">{{__('Go back to the home page')}}</a>
        </li>
      </ul>
    </div>
    <!-- sidebar -->
    <div class="col content-grey">
      <nav class="p-3 shadow text-end">

        {{-- Así con rol, pero no lo traduce (como aquí se supone que todo el que está es administrador, traducir solo lo de Admin y no puesto el rol). Puesta en la siguiente línea no comentada --}} 
        {{-- <a class="nav-link active">{{Auth::user()->getName()}} - ({{Auth::user()->getRole()}}) ({{Auth::user()->getBalance()}}{{__('$')}}) <img class="img-profile rounded-circle" src="{{ asset('/img/perfilRuben.jpg') }}"></a> --}}
        <a class="nav-link active">{{Auth::user()->getName()}} - <span class="profile-font">({{__('Admin')}})</span> ({{Auth::user()->getBalance()}}{{__('$')}}) <img class="img-profile rounded-circle" src="{{ asset('/img/perfilRuben.jpg') }}"></a>
        
        {{-- Así era solo Admin y la imagen: --}}
        {{-- <span class="profile-font">({{__('Admin')}})</span> --}}
        {{-- <img class="img-profile rounded-circle" src="{{ asset('/img/perfilRuben.jpg') }}"> --}}

      </nav>

      <div class="g-0 m-5">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>
        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
          href="https://twitter.com/rugrenrrg">Rubén García (Twitter)
      </small>
    </div>
  </div>
  <!-- footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>

</html>
