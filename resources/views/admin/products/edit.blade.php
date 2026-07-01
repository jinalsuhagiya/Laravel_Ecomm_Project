@extends('admin.maindesign')

@section('dashboard')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Edit Product</h3>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $product->name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description"
                              class="form-control"
                              rows="4">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number"
                           name="price"
                           step="0.01"
                           class="form-control"
                           value="{{ old('price', $product->price) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number"
                           name="quantity"
                           class="form-control"
                           value="{{ old('quantity', $product->quantity) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>

                    <select name="category_id" class="form-select">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>

                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}"
                             alt="Product Image"
                             width="100"
                             class="img-thumbnail">
                    @else
                        <p class="text-muted">No Image Available</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Change Image</label>
                    <input type="file"
                           name="image"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select name="status" class="form-select">
                        <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update Product
                </button>

                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>
    </div>
</div>

@endsection
