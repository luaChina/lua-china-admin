@extends('layouts.app')

@section('content')
    <table class="table table-hover table-striped table-bordered">
        <thead>
        <tr>
            <td>id</td>
            <td>title</td>
            <td>tag</td>
            <td>user</td>
            <td>thumbnail</td>
            <td>read count</td>
            <td>created_at</td>
            <td>updated_at</td>
            <td>status</td>
        </tr>
        </thead>

        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title}}</td>
                <td>{{ $post->tag->type }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->thumbnail }}</td>
                <td>{{ $post->read_count }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at}}</td>
                <td>{{ $post->deleted_at? __('system.post.down') : __('system.post.normal') }}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection