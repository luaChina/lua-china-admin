@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">用户列表</li>
        </ol>
    </nav>
    <span class="badge badge-pill badge-primary">用户总数 {{ $userPagination->total() }}</span>
    <span class="badge badge-pill badge-success">普通用户总数 {{ $normalUsers->count() }}</span>
    <span class="badge badge-pill badge-danger">禁用用户总数 {{ $lockedUsers->count() }}</span>
    <table class="table table-hover table-striped table-bordered text-center">
        <thead>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>created_at</td>
            <td>updated_at</td>
            <td>status</td>
            <td>操作</td>
        </tr>
        </thead>

        <tbody>
        @foreach($userPagination as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at}}</td>
                <td>{{ $user->deleted_at? __('system.user.locked') : __('system.user.normal') }}</td>
                <td>
                    <a href="/users/{{ $user->id }}/edit" class="btn btn-primary">编辑</a>
                    @if($user->deleted_at === null)
                        <button type="button" class="btn btn-danger">禁用</button>
                    @else
                        <button type="button" class="btn btn-success">恢复</button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $userPagination->links() }}
@endsection