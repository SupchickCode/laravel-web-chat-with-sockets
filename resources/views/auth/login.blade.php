@extends('tmp.base')

@section('content')
    <div class="container">
        <div class="center-block">
            <form method="POST" action="{{ route('postLogin') }}">
                @csrf
                <input id="token" type="text" class="form-control @error('token') is-invalid @enderror" name="token"
                    value="{{ old('token') }}" required autocomplete="token" autofocus>
                @error('token')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button type="submit" class="btn btn-primary">
                    {{ __('Join') }}
                </button>
            </form>
        </div>
    </div>
@endsection
