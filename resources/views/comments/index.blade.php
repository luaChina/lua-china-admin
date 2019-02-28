@extends('layouts.app')

@section('content')
    <table class="table table-hover table-striped table-bordered">
        <thead>
        <tr>
            <td>id</td>
            <td>文章标题</td>
            <td>评论内容</td>
            <td>用户</td>
            <td>用户id</td>
            <td>created_at</td>
            <td>updated_at</td>
            <td>状态</td>
            <td>操作</td>
        </tr>
        </thead>

        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->post->title }}</td>
                <td>{{ $comment->content}}</td>
                <td>{{ $comment->user->name }}</td>
                <td>{{ $comment->user->id }}</td>
                <td>{{ $comment->created_at }}</td>
                <td>{{ $comment->updated_at}}</td>
                <td>{{ $comment->deleted_at? __('system.post.down') : __('system.post.normal') }}</td>
                <td>@if($comment->deleted_at === null)
                        <button type="button" class="btn btn-danger" @click="deleteAlert('/comments/{{ $comment->id }}')">
                            禁用
                        </button>
                    @else
                        <button type="button" class="btn btn-success"
                                @click="restore('/comments/{{ $comment->id }}/restore')">恢复
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $comments->links() }}
@endsection