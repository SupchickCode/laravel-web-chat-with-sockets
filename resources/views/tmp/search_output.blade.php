@extends('tmp.base')

@section('title', $varForRender['title'])

@section('content')
    <div class="center-block">
        <h2>Room <span class="alert-token">{{ $varForRender['chatroom']['chatroom'] }}</span></h2>
        <a class="btn btn-info" href="/chatroom/{{ $varForRender['chatroom']['chatroom'] }}">Join this room
            {{ $varForRender['chatroom']['chatroom'] }}</a>
    </div>
@endsection
