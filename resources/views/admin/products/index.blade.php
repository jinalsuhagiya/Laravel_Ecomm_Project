@extends('admin.maindesign')

@section('dashboard')

<h2>Product List</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('products.create') }}">Add Product</a>

<br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Image</th>
        <th>Category</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @forelse($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>₹{{ $product->price }}</td>
        <td>{{ $product->quantity }}</td>

        <td>
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" width="50">
            @else
                No Image
            @endif
        </td>

        <td>{{ $product->category->name ?? '-' }}</td>

        <td>
            {{ $product->status == 1 ? 'Active' : 'Inactive' }}
        </td>

        <td>
            <a href="{{ route('products.edit', $product->id) }}">Edit</a>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Delete?')">Delete</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="8">No Products Found</td>
    </tr>
    @endforelse

</table>

@endsection
