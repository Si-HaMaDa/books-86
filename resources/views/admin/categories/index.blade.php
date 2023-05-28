@extends('admin.layout.main')

@section('content')
    <div class="page-content">
        <div>
            <a class="float-end btn btn-primary" href="#/categories/add.php">Add Category</a>
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

                @foreach ([] as $category)
                    <tr>
                        <td>{{ $category['id'] }}</td>
                        <td>{{ $category['name'] }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="#/categories/show.php?id={{ $category['id'] }}">
                                Show
                            </a> |
                            <a class="btn btn-sm btn-warning" href="#/categories/edit.php?id={{ $category['id'] }}">
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
    </div>
@endsection
