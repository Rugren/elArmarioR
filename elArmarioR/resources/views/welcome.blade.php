@extends('layouts.app')
@section('title', 'Home Page - elArmarioR')
@section('content')

<div class="text-center">
@include('partials/language_switcher')
</div>

<div class="text-center">
  {{-- Welcome to our website! --}}
  {{ __('Welcome to our website!') }}
</div>
@endsection
