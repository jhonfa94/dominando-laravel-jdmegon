@extends('layouts.app')

@section('title')
    | Carts
@endsection


@section('content')
    <h1>You cart</h1>
    @if (!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-danger" role="alert">
            Your cart is empty.
        </div>
    @else
        <div class="row">
            @foreach ($cart->products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>

        {{-- <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-4 col-lg-3">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div> --}}
    @endif
@endsection
