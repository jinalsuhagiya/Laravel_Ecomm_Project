@extends('admin.maindesign')

@section('dashboard')

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

    {{-- Category Name --}}
    <div>
        <label>Category Name:</label><br>
        <input type="text"
               name="name"
               value="{{ old('name') }}"
               placeholder="Enter Category Name"
               required>
    </div>

    <br>

    {{-- Parent Category --}}
    <div>
        <label>Parent Category:</label><br>

        <select name="parent_id">
            <option value="">Main Category</option>

            @foreach($categories as $parent)

                {{-- Parent --}}
                <option value="{{ $parent->id }}"
                    {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                    {{ $parent->name }}
                </option>
            @endforeach

        </select>
    </div>

    <br>

    <button type="submit"
            style="padding:6px 12px; background:green; color:white; border:none;">
        Save
    </button>

</form>

<br>

<a href="{{ route('category.index') }}">Back</a>

@endsection
