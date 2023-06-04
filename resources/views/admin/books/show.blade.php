@extends('admin.layout.main')

@section('title', 'Admin Area | Show Book')

@section('content')

    <div class="page-content card">
        <div class="row g-3 card-body">
            <div class="card-title">
                <a class="float-end btn btn-primary mt-3" href="{{ route('admin.books.index') }}">Back</a>
                <h1 class="mt-3">Show Book</h1>
            </div>
            <div class="col-12">
                <label class="form-label" for="inputTitle">Title</label>
                <input class="form-control" id="inputTitle" name="title" type="text" value="{{ $book->title }}"
                    disabled>
            </div>
            <div class="col-12">
                <label class="form-label" for="inputDescription">Description</label>
                <textarea class="form-control" id="inputDescription" name="description" disabled>{{ $book->description }}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label d-block" for="inputImage">Image</label>
                <img class="img-thumbnail" src="{{ \Storage::url($book->image) }}" alt="" srcset="" width="50%">
            </div>
            <div class="col-12">
                <label class="form-label" for="inputCategory">Category</label>
                <p>{{ $book->category->name }}</p>
            </div>
            <div class="col-12">
                <label class="form-label" for="inputHashtags">Hashtags</label>
                @foreach ($book->hashtags  as $hashtag)
                    <p class="d-inline btn btn-bd-primary">{{ $hashtag->name }}</p>
                @endforeach
            </div>
        </div>
    </div>

@endsection
