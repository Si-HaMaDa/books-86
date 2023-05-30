@extends('admin.layout.main')

@section('title', 'Admin Area | Create Hashtag')

@section('content')

    <div class="page-content card">
        <form class="row g-3 card-body" action="{{ route('admin.hashtags.store') }}" method="POST">
            @csrf
            <div class="card-title">
                <a class="float-end btn btn-primary mt-3" href="{{ route('admin.hashtags.index') }}">Back</a>
                <h1 class="mt-3">Add Hashtag</h1>
            </div>
            <div class="col-12">
                <label class="form-label" for="inputName">Name</label>
                <input class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" type="text"
                    value="{{ old('name') }}" placeholder="Name...">
                @error('name')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>

@endsection
