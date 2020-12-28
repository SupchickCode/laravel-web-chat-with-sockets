@extends('tmp.base')

@section('title', $varForRender['title'])

@section('content')
    <div class="container">
        <div class="parent">
            <form class="center-block" action="{{ route('search_value') }}" method="POST">
                @csrf
                <h3><label for="input" class="form-label">Find your Friend</label></h3>
                <input type="text" id="input" name="input" class="form-control" aria-describedby="help_info">
                <button type="submit" class="mt-2 btn btn-info btn">Find</button>
                <div id="help_info" class="form-text">
                    *Try to find chatroom with name;
                </div>
            </form>
        </div>
    </div>
@endsection
