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
                @foreach ($flights as $flight)
                    <tr>
                        <td>{{ $flight->id }}</td>
                        <td>{{ $flight->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $flights->links('pagination::bootstrap-5') !!}
    </div>
@endsection
