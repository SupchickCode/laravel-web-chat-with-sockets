@extends('tmp.base')
@section('title', 'Join us')
@section('content')
    <div class="container">
        <div class="center-block">
            <form method="POST" action="{{ route('postLogin') }}">
                @csrf
                <h3><label for="input" class="form-label">Join us faster =)</label></h3>
                <input id="token" type="text" class="form-control @error('token') is-invalid @enderror" name="token"
                    value="{{ old('token') }}" required autocomplete="token" autofocus>
                @error('token')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div id="help_info" class="form-text">
                    *Input your token please
                </div>
                <button type="submit" class="mt-2 btn btn-info btn">Join</button>
            </form>
        </div>
    </div>
@endsection
