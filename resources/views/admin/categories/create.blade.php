@extends('admin.layout.main')

@section('title', 'Admin Area | Create Category')

@section('content')

    <div class="page-content card">
        <form class="row g-3 card-body" action="{{ url('admin/categories') }}" method="POST">
            @csrf
            <div class="card-title">
                <a class="float-end btn btn-primary mt-3" href="{{ url('admin/categories') }}">Back</a>
                <h1 class="mt-3">Add Category</h1>
            </div>
            <div class="col-12">
                <label class="form-label" for="inputName">Name</label>
                <input class="form-control" id="inputName" name="name" type="text" placeholder="Name...">
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>

@endsection
