@extends('admin.maindesign')

@section('dashboard')

<h2>Category List</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('category.create') }}">+ Add Category</a>

<br><br>

<table border="1" width="100%" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Parent Category</th>
        <th>Action</th>
    </tr>

    @foreach($categories as $cat)
    <tr>
        <td>{{ $cat->id }}</td>

        <td>{{ $cat->name }}</td>

        <td>
            {{ $cat->parent->name ?? 'Main Category' }}
        </td>

        <td>
            <a href="{{ route('category.edit', $cat->id) }}">Edit</a>

            <form action="{{ route('category.destroy', $cat->id) }}"
                  method="POST"
                  style="display:inline;">
                @csrf
                @method('DELETE')

                <button onclick="return confirm('Delete?')">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection
