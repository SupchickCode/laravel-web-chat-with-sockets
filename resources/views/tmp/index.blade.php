@extends('tmp.base')

@section('title', $varForRender['title'])

@section('content')
    <div class="parent">
        <div class="center-block">
            <form id="get_token_form" class="block_form" method="POST" action="{{ route('getToken') }}">
                @csrf
                <h3>Welcome, User.<br>if you want to start press button</h3>
                <br>
                <button type="submit" class="btn btn-success btn-lg">Get your token</button>
                <a href="{{ route('findToken') }}" class="btn btn-info btn-lg">Find your friends</a>
                <a href="{{ route('login') }}">
                    <p class="mt-4 fw-light">Already have a secret token ?</p>
                </a>
            </form>
        </div>
    </div>
@endsection
