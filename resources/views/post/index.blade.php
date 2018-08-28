@extends('layouts.app')

@section('content')
    <table class="table table-hover table-striped table-bordered">
        <thead>
        <tr>
            <td>id</td>
            <td>title</td>
            <td>tag</td>
            <td>user</td>
            <td>read count</td>
            <td>created_at</td>
            <td>updated_at</td>
            <td>状态</td>
            <td>操作</td>
        </tr>
        </thead>

        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title}}</td>
                <td>{{ $post->postTag->type }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->read_count }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at}}</td>
                <td>{{ $post->deleted_at? __('system.post.down') : __('system.post.normal') }}</td>
                <td>@if($post->deleted_at === null)
                        <button type="button" class="btn btn-danger" @click="deleteAlert('/posts/{{ $post->id }}')">
                            禁用
                        </button>
                    @else
                        <button type="button" class="btn btn-success"
                                @click="restore('/posts/{{ $post->id }}/restore')">恢复
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
@endsection