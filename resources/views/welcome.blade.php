@extends('layouts.app')

@section('content')
    <h1>Welcome</h1>
    @empty($products)
        <div class="alert alert-danger" role="alert">
            No products yet!
        </div>
    @else
        <div class="row">
            @foreach ($products as $product)
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
    @endempty
@endsection
