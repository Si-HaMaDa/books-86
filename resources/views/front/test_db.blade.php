@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>#</td>
                    <td>name</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $users->links('pagination::bootstrap-5') !!}
    </div>
@endsection
