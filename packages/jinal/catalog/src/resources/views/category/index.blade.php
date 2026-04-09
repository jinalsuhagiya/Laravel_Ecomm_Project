@extends('admin.maindesign')

@section('dashboard')

<h2>Category List</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('category.create') }}">Add Category</a>

<br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

    @forelse($categories as $cat)
    <tr>
        <td>{{ $cat->id }}</td>
        <td>{{ $cat->name }}</td>
        <td>

            <a href="{{ route('category.edit', $cat->id) }}">Edit</a>

            <form action="{{ route('category.destroy', $cat->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>

        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3">No Categories Found</td>
    </tr>
    @endforelse

</table>

@endsection
