@extends('admin.maindesign')

@section('dashboard') {{-- ✅ section name fix --}}
<h2>Edit Category</h2>

{{-- Error --}}
@if(isset($errors) && $errors->any())
    <div style="color:red">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('category.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $category->name }}">

    <button type="submit">Update</button>
</form>

<a href="{{ route('category.index') }}">Back</a>

@endsection
