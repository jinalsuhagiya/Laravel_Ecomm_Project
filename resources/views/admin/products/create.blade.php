@extends('admin.maindesign')

@section('dashboard')

<h2>Add Product</h2>

@if($errors->any())
<div style="color:red">
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
@csrf

Name: <input type="text" name="name"><br><br>

Description: <textarea name="description"></textarea><br><br>

Price: <input type="number" name="price" step="0.01"><br><br>

Quantity: <input type="number" name="quantity"><br><br>

Category:
<select name="category_id">
    <option value="">Select Category</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
    @endforeach
</select>
<br><br>

Image: <input type="file" name="image"><br><br>

Status:
<select name="status">
    <option value="1">Active</option>
    <option value="0">Inactive</option>
</select>
<br><br>

<button type="submit">Save</button>

</form>

@endsection
