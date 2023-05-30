@extends('admin.layout.main')

@section('title', 'Admin Area | Show Hashtag')

@section('content')

    <div class="page-content card">
        <div class="row g-3 card-body">
            <div class="card-title">
                <a class="float-end btn btn-primary mt-3" href="{{ route('admin.hashtags.index') }}">Back</a>
                <h1 class="mt-3">Show Hashtag</h1>
            </div>
            <div class="col-12">
                <label class="form-label" for="inputName">Name</label>
                <input class="form-control" id="inputName" name="name" type="text" value="{{ $hashtag->name }}"
                    disabled>
            </div>
        </div>
    </div>

@endsection
