@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">管理员列表</li>
        </ol>
    </nav>
    <a href="/admins/create" class="btn btn-primary">新增管理员</a>
    <table class="table table-hover table-striped table-bordered text-center">
        <thead>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>created_at</td>
            <td>updated_at</td>
            <td>status</td>
            <td>operate</td>
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
                <td>@if($admin->id === 1)
                        <button type="button" class="btn btn-block">^_^</button>
                    @else
                        <a href="/admins/{{ $admin->id }}/edit" class="btn btn-primary">编辑</a>
                        @if($admin->deleted_at === null)
                            <button type="button" class="btn btn-danger">禁用</button>
                        @else
                            <button type="button" class="btn btn-success">恢复</button>
                        @endif
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection