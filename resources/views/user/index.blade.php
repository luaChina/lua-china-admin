@extends('layouts.app')

@section('content')
    <table class="table table-hover table-striped table-bordered">
        <thead>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>created_at</td>
            <td>updated_at</td>
            <td>status</td>
        </tr>
        </thead>

        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at}}</td>
                <td>{{ $user->deleted_at? __('system.user.locked') : __('system.user.normal') }}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection