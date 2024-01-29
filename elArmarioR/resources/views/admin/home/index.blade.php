@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
  <div class="card-header">
    {{-- Admin Panel - Home Page (así estaba en texto, pero como está abajo ya traduce a los idiomas--}}
    {{__('Admin Panel - Home Page')}}
  </div>
  <div class="card-body">
    {{__('Welcome to the Admin Panel, use the sidebar to navigate between the different options.')}}
  </div>
</div>
@endsection
