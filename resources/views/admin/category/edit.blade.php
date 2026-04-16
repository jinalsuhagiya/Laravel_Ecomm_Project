@extends('admin.maindesign')

@section('dashboard')

<h2>Edit Category</h2>

{{-- Error --}}
@if($errors->any())
    <div style="color:red">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('category.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Category Name --}}
    <div>
        <label>Category Name:</label><br>
        <input type="text"
               name="name"
               value="{{ old('name', $category->name) }}"
               required>
    </div>

    <br>

    {{-- Parent Category --}}
    <div>
        <label>Parent Category:</label><br>

        <select name="parent_id">
            <option value="">Main Category</option>

            @foreach($categories as $cat)

                {{-- prevent self parent --}}
                @if($cat->id != $category->id)

                    <option value="{{ $cat->id }}"
                        {{ old('parent_id', $category->parent_id) == $cat->id ? 'selected' : '' }}>

                        {{ $cat->name }}

                    </option>

                @endif

            @endforeach

        </select>
    </div>

    <br>

    <button type="submit"
            style="padding:6px 12px; background:blue; color:white; border:none;">
        Update
    </button>

</form>

<br>

<a href="{{ route('category.index') }}">Back</a>

@endsection
