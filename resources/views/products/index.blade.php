@extends('layouts.app')

@section('title')
    | Products
@endsection

@section('content')

    <h1>List of Products</h1>

    <a href="{{ route('products.create') }}" class="btn btn-success">
        Creat
    </a>

    @empty($products)
        <div class="alert alert-warning">
            This list of products is empty
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->status }}</td>
                            <td >
                                <a href="{{route('products.show', ['product' => $product->id])}}" class="btn btn-link">Show</a>
                                {{-- <a href="{{route('products.show', ['product' => $product->title])}}" class="btn btn-link">Show</a> --}}
                                <a href="{{route('products.edit', ['product' => $product->id])}}" class="btn btn-link">Edit</a>
                                <form action="{{route('products.destroy', ['product' => $product->id])}}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="btn btn-sm btn-link"
                                        onclick="confirm('Confirm delete product {{$product->id}}')"
                                        >
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty
@endsection
