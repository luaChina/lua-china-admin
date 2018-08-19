@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">权限列表</li>
        </ol>
    </nav>
    <table class="table table-hover table-striped table-bordered text-center">
        <thead>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>created_at</td>
            <td>updated_at</td>
        </tr>
        </thead>

        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name}}</td>
                <td>{{ $permission->created_at }}</td>
                <td>{{ $permission->updated_at}}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection