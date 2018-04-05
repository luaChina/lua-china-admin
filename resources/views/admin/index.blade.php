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
        @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name}}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->created_at }}</td>
                <td>{{ $admin->updated_at}}</td>
                <td>{{ $admin->deleted_at? __('system.user.locked') : __('system.user.normal') }}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection