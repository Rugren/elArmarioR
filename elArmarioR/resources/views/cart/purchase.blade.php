@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
  <div class="card-header">
    {{__('Purchase Completed')}}
  </div>
  <div class="card-body">
    <div class="alert alert-success" role="alert">
      {{__('Congratulations, purchase made successfully. Order number:')}} <b>#{{ $viewData["order"]->getId() }}</b>
    </div>
  </div>
</div>
@endsection
