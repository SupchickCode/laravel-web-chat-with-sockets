@extends('tmp.base')

@section('title', $varForRender['title'])

@section('content')

    <h1>{{ isset($varForRender['chatroom']) ? $varForRender['chatroom'] : '' }}</h1>
    <h1>{{ isset($varForRender['user']) ? $varForRender['user'] : '' }}</h1>

@endsection
