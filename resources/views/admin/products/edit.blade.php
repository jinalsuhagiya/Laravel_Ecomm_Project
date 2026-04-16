@extends('admin.maindesign')

@section('dashboard')

<h2>Edit Product</h2>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

Name:
<input type="text" name="name" value="{{ $product->name }}"><br><br>

Description:
<textarea name="description">{{ $product->description }}</textarea><br><br>

Price:
<input type="number" name="price" value="{{ $product->price }}"><br><br>

Quantity:
<input type="number" name="quantity" value="{{ $product->quantity }}"><br><br>

Category:
<select name="category_id">
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
            {{ $cat->name }}
        </option>
    @endforeach
</select>
<br><br>

Current Image:
@if($product->image)
    <img src="{{ asset('storage/'.$product->image) }}" width="60"><br>
@endif

Change Image:
<input type="file" name="image"><br><br>

Status:
<select name="status">
    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
</select>

<br><br>

<button type="submit">Update</button>

</form>

@endsection
