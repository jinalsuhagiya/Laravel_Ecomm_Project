@extends('admin.maindesign')

@section('dashboard') {{-- ✅ section name fix --}}
<h2>Add Category</h2>

{{-- Error --}}
@if($errors->any())
    <div style="color:red">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('category.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Category Name">

    <button type="submit">Save</button>
</form>

<a href="{{ route('category.index') }}">Back</a>

@endsection