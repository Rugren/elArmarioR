@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

<div>
  <h1 class="text-center">{{$viewData['title']}}</h1>
</div>

<br>

<div>
  <p class="text-center">{{__('You are lost? A product search may help you:')}}</p>
  {{-- Botón que enlaza a la página de productos --}}
  <h4 class="text-center"><a href="{{ route('product.index') }}" class="mt-2 btn bg-primary text-white">{{__('See all products in the store')}}</h4></a>
</div>

{{-- Esto es lo que estaba por defecto: 
  <div class="row">
  <div class="col-md-6 col-lg-4 mb-2">
    <img src="{{ asset('/img/game.png') }}" class="img-fluid rounded">
  </div>
  <div class="col-md-6 col-lg-4 mb-2">
    <img src="{{ asset('/img/safe.png') }}" class="img-fluid rounded">
  </div>
  <div class="col-md-6 col-lg-4 mb-2">
    <img src="{{ asset('/img/submarine.png') }}" class="img-fluid rounded">
  </div>
</div> --}}

@endsection
