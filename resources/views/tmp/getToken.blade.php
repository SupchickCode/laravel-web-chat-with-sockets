@extends('tmp.base')

@section('title', $varForRender['title'])

@section('content')
    <div class="parent">
        <div class="center-block">
            <p><a href="/">← back</a></p>
            <h3>You are almost ready to <br>share your key with friend</h3><br>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="col-md-6 mb-2">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" placeholder="Enter your name" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <h5 class="mt-3">Your token: <span class='alert-token'> {{ $varForRender['token'] }} </span></h5>
                <h6 class="text-muted">*Save this token and don't show it for anyone</h6>
                <input id="token" type="hidden" name="token"
                    value="{{ $varForRender['token'] }}" required>

                <button type="submit" class="btn btn-info mt-2 btn-lg">
                    {{ __('Create an account') }}
                </button>
            </form>
        </div>
    </div>
@endsection
