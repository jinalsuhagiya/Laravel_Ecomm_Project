@extends('admin.maindesign')

@section('dashboard')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Product List</h3>

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Product
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover align-middle">

                    <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse($products as $product)

                        <tr>

                            <td>{{ $product->id }}</td>

                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}"
                                         width="70"
                                         height="70"
                                         class="rounded border">
                                @else
                                    <span class="text-danger">No Image</span>
                                @endif
                            </td>

                            <td>{{ $product->name }}</td>

                            <td>{{ $product->category->name ?? '-' }}</td>

                            <td>₹ {{ number_format($product->price,2) }}</td>

                            <td>{{ $product->quantity }}</td>

                            <td>
                                @if($product->status)

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>

                                @endif
                            </td>

                            <td>

                                <a href="{{ route('products.edit',$product->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('products.destroy',$product->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8" class="text-center text-danger">
                                No Products Found
                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
