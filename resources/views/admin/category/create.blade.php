@extends('admin.maindesign')

@section('dashboard')

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <h3>Add Category</h3>
        </div>

        <div class="card-body">

            {{-- Validation Errors --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('category.store') }}" method="POST">
                @csrf

                {{-- Category Name --}}
                <div class="mb-3">
                    <label class="form-label">Category Name</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Enter Category Name"
                           value="{{ old('name') }}"
                           required>
                </div>

                {{-- Parent Category --}}
                <div class="mb-3">
                    <label class="form-label">Parent Category</label>

                    <select name="parent_id" class="form-select">
                        <option value="">Main Category</option>

                        @foreach($categories as $parent)
                            <option value="{{ $parent->id }}"
                                {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                {{ $parent->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Buttons --}}
                <button type="submit" class="btn btn-success">
                    Save Category
                </button>

                <a href="{{ route('category.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
