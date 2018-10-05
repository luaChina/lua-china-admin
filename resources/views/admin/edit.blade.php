@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admins">管理员列表</a></li>
            <li class="breadcrumb-item active" aria-current="page">新增管理员</li>
        </ol>
    </nav>
    <form action="/admins/{{ $admin->id }}" method="post" class="needs-validation" novalidate>
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="form-group row">
            <div class="col-md-2">
                <label for="nickname">昵称</label>
            </div>
            <div class="col-md-6 mb-3">
                <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                       id="nickname" placeholder="nickname" value="{{ old('name', $admin->name) }}" required>
                <span class="invalid-tooltip">
                    <strong>{{ $errors->has('name') ? $errors->first('name') : '请输入用户名'}}</strong>
                </span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <label for="role">权限分配</label>
            </div>
            <div class="col-md-6 mb-3">
                @foreach($permissions as $permission)
                    <div class="custom-control custom-checkbox">
                        <input name="permissions[]" type="checkbox" class="custom-control-input"
                               id="permission{{$permission['id']}}" value="{{$permission['id']}}"
                        @if($admin->adminPermissions->contains('permission_id', $permission['id']))
                            checked
                        @endif
                        >
                        <label class="custom-control-label"
                               for="permission{{$permission['id']}}">{{$permission['name']}}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <label for="email">邮箱地址</label>
            </div>
            <div class="col-md-6 mb-3">
                <input name="email" value="{{ old('email', $admin->email) }}" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" placeholder="name@example.com" required>
                <span class="invalid-tooltip">
                    <strong>{{ $errors->has('email') ? $errors->first('email') : '请输入邮件地址'}}</strong>
                </span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <label for="password">密码</label>
            </div>
            <div class="col-md-6 mb-3">
                <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password">
                <span class="invalid-tooltip">
                    <strong>{{ $errors->has('password') ? $errors->first('password') : '请输入密码'}}</strong>
                </span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <label for="password_confirmation">确认密码</label>
            </div>
            <div class="col-md-6 mb-3">
                <input name="password_confirmation" type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : ''}}" id="password_confirmation">
                <span class="invalid-tooltip">
                    <strong>{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '请再次输入密码'}}</strong>
                </span>
            </div>
        </div>
        @if($errors->has('system'))
             <div class="text-danger">
                <strong>{{ $errors->first('system') }}</strong>
            </div>
        @endif
        <div class="form-group row">
            <div class="col-md-8">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </form>
@endsection