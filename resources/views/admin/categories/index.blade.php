@extends('admin.layout.main')

@section('title', 'Admin Area | Categories')

@section('content')
    <div class="page-content">
        <div>
            <a class="float-end btn btn-primary" href="{{ route('admin.categories.create') }}">Add Category</a>
            <h1 class="mt-3">Categories</h1>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category['id'] }}</td>
                        <td>{{ $category['name'] }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.categories.show', $category['id']) }}">
                                Show
                            </a> |
                            <a class="btn btn-sm btn-warning" href="{{ route('admin.categories.edit', $category['id']) }}">
                                Edit
                            </a> |
                            <a class="btn btn-sm btn-danger" href="#/categories?delete={{ $category['id'] }}">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {!! $categories->links('pagination::bootstrap-5') !!}
    </div>
@endsection
