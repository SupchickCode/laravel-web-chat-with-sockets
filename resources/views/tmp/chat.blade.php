@extends('tmp.base')

@section('title', $varForRender['title'])

@section('content')

@endsection

@section('chat')
    <chat :user={{ auth()->user() }} id="app"></chat>

    
@endsection
