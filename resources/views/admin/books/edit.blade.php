@extends('admin.layout.main')

@section('title', 'Admin Area | Edit Book')

@section('content')

    <div class="page-content card">
        <form class="row g-3 card-body" action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-title">
                <a class="float-end btn btn-primary mt-3" href="{{ route('admin.books.index') }}">Back</a>
                <h1 class="mt-3">Edit Book</h1>
            </div>

            <div class="col-12">
                <label class="form-label" for="inputTitle">Title</label>
                <input class="form-control @error('title') is-invalid @enderror" id="inputTitle" name="title"
                    type="text" value="{{ old('title', $book->title) }}" placeholder="Title...">
                @error('title')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="inputDescription">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="inputDescription"
                    name="description"placeholder="Description...">{{ old('description', $book->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="inputImage">Image</label>
                <input class="form-control @error('image') is-invalid @enderror" id="inputImage" name="image"
                    type="file" placeholder="Image...">
                @error('image')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
                <img class="img-thumbnail m-1" src="{{ \Storage::url($book->image) }}" width="50%">
            </div>

            <div class="col-12">
                <label class="form-label" for="inputCategory">Category</label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="inputCategory"
                    name="category_id">
                    <option value="" disabled selected>Choose Category</option>

                    @foreach ($categories as $key => $title)
                        <option value="{{ $key }}" @selected(old('category_id', $book->category_id) == $key)>{{ $title }}</option>
                    @endforeach

                </select>
                @error('category_id')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label" for="inputHashtags">Hashtags</label>
                <select class="form-control @error('hashtags[]') is-invalid @enderror" id="inputHashtags" name="hashtags[]"
                    multiple>
                    @foreach ($hashtags as $key => $title)
                        <option value="{{ $key }}" @selected(in_array($key, old('hashtags', $book->hashtags->pluck('id')->toArray())))>
                            {{ $title }}
                        </option>
                    @endforeach

                </select>
                @error('hashtags[]')
                    <div class="alert alert-danger my-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>

@endsection
