@extends('tmp.base')

@section('title', $varForRender['title'])

@section('content')
    <div class="parent">
        <div class="block_form">
            <p><a href="/">← back</a></p>
            <h3>You are ready to join,<br>Now share your key with friend</h3><br>
            <h5>Your token: <span class='alert-token'> {{ $varForRender['token'] }} </span></h5>
        </div>
    </div>
@endsection
