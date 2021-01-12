@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-sm-12 col-md-8">
                <h1 class="text-center">Create a product</h1>
                <form action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" class="form-control" type="text" name="title" value="{{ old('title') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input id="description" class="form-control" type="text" name="description"
                            value="{{ old('description') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input id="price" class="form-control" type="number" min="1.00" step="0.01" name="price"
                            value="{{ old('price') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input id="stock" class="form-control" type="number" name="stock" min="0" value="{{ old('stock') }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" class="form-control" name="status">
                            <option selected disabled>Seleccionar</option>
                            <option {{ old('status') == 'available' ? 'selected' : '' }} value="available">available
                            </option>
                            <option {{ old('status') == 'unavailable' ? 'selected' : '' }} value="unavailable">unavailable
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-lg">
                            Create Product
                        </button>
                    </div>





                </form>
            </div>{{-- col --}}

        </div>{{-- row --}}
    </div>{{-- container --}}




@endsection
