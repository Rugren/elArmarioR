
@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('/storage/' . $viewData['product']->getImage()) }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $viewData['product']->getName() }} (${{ $viewData['product']->getPrice() }})
                    </h5>
                    <p class="card-text">{{ $viewData['product']->getDescription() }}</p>
                    <p class="card-text">
                    <form method="POST" action="{{ route('cart.add', ['id' => $viewData['product']->getId()]) }}">
                        <div class="row">
                            @csrf
                            <div class="col-auto">
                                <div class="input-group col-auto">
                                    <div class="input-group-text">{{ __('Quantity') }}</div>
                                    <input type="number" min="1" max="10" class="form-control quantity-input"
                                        name="quantity" value="1">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn bg-primary text-white" type="submit">{{ __('Addtocart') }}</button>
                            </div>
                        </div>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
      <div class="card-header">
        {{__('Comments of products')}}
      </div>
        <div class="col-md-8">
            <div class="card-body">
                <form method="POST" action="{{ route('comment.save', ['id' => $viewData['product']->getId()]) }}">
                    @csrf
                    <div class="mb-3">
                        <h5 class="card-title">
                            {{ $viewData['userName'] }}
                        </h5>
                        <div class="mb-3">
                            <label class="form-label">{{__('Comment:')}}</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="product_id" value="{{ $viewData['product']->getId() }}">
                    <input type="hidden" name="user_id" value="{{ $viewData['userId'] }}">
                    <button type="submit" class="btn btn-primary">{{__('Send')}}</button>
                </form>

        </div>
    </div>
            <div class="col-md-12">
                <div class="card-body">
                    @forelse ($viewData['comment'] as $comment)
                        @if ($comment->getProductId() == $viewData['product']->getId())
                            <div class="comment">
                                <h4 class="comment-user">{{ $comment->user->getName() }}</h4>
                                <div class="comment-text">
                                  {{-- Aquí muestra el/los comentarios: --}}
                                    {{ $comment->comment }}
                                </div>
                                {{-- Puesto un <br> de separador para que se vea mejor entre comentario y comentario --}}
                                <br>
                            </div>
                        @endif
                    @empty
                        <p>{{__('No comments available')}}</p>
                    @endforelse
                </div>
            </div>
    </div> 

@endsection

{{-- Así es como estaba sin modificar:
@extends('layouts.app') 
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/storage/'.$viewData["product"]->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          {{ $viewData["product"]->getName() }} (${{ $viewData["product"]->getPrice() }})
        </h5>
        <p class="card-text">{{ $viewData["product"]->getDescription() }}</p>
        <p class="card-text">
        <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">
          <div class="row">
            @csrf
            <div class="col-auto">
              <div class="input-group col-auto">
                <div class="input-group-text">Quantity</div>
                <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
              </div>
            </div>
            <div class="col-auto">
              <button class="btn bg-primary text-white" type="submit">Add to cart</button>
            </div>
          </div>
        </form>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
--}}