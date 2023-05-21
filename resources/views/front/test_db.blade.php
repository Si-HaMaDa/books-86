@extends('layouts.app')

@section('content')
    <div class="container">
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
    </div>
@endsection
