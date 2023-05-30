@extends('admin.layout.main')

@section('title', 'Admin Area | Hashtags')

@section('content')
    <div class="page-content">
        <div>
            <a class="float-end btn btn-primary" href="{{ route('admin.hashtags.create') }}">Add Hashtag</a>
            <h1 class="mt-3">Hashtags</h1>
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

                @foreach ($hashtags as $hashtag)
                    <tr>
                        <td>{{ $hashtag['id'] }}</td>
                        <td>{{ $hashtag['name'] }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.hashtags.show', $hashtag['id']) }}">
                                Show
                            </a> |
                            <a class="btn btn-sm btn-warning" href="{{ route('admin.hashtags.edit', $hashtag['id']) }}">
                                Edit
                            </a> |
                            <form class="d-inline" action="{{ route('admin.hashtags.destroy', $hashtag['id']) }}"
                                method="post">
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

        {!! $hashtags->links('pagination::bootstrap-5') !!}
    </div>
@endsection
