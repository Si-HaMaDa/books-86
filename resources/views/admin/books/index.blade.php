@extends('admin.layout.main')

@section('title', 'Admin Area | Books')

@section('content')
    <div class="page-content">
        <div>
            <a class="float-end btn btn-primary" href="{{ route('admin.books.create') }}">Add Book</a>
            <h1 class="mt-3">Books</h1>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Title</td>
                    <td>Category</td>
                    <td>Image</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>

                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book['id'] }}</td>
                        <td>{{ $book['title'] }}</td>
                        <td>{{ $book['category']['name'] }}</td>
                        <td><img class="img-thumbnail" src="{{ \Storage::url($book['image']) }}" srcset="" alt=""
                                width="200"></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.books.show', $book['id']) }}">
                                Show
                            </a> |
                            <a class="btn btn-sm btn-warning" href="{{ route('admin.books.edit', $book['id']) }}">
                                Edit
                            </a> |
                            <form class="d-inline" action="{{ route('admin.books.destroy', $book['id']) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {!! $books->links('pagination::bootstrap-5') !!}
    </div>
@endsection
