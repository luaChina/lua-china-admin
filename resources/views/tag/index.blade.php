@extends('layouts.app')

@section('content')
    <table class="table table-hover table-striped table-bordered">
        <thead>
        <tr>
            <td>id</td>
            <td>type</td>
            <td>created_at</td>
            <td>updated_at</td>
            <td>status</td>
        </tr>
        </thead>

        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->type}}</td>
                <td>{{ $tag->created_at }}</td>
                <td>{{ $tag->updated_at}}</td>
                <td>{{ $tag->deleted_at? __('system.user.locked') : __('system.user.normal') }}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection