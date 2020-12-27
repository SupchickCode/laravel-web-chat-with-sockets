@extends('tmp.base')

@section('title', $varForRender['title'])

@section('content')
    <div class="container">
        <div class="parent">
            <form class="center-block">
                <h3><label for="input" class="form-label">Find your Friend</label></h3>
                <input type="text" id="input" class="form-control" aria-describedby="help_info">
                <button type="submit" class="mt-2 btn btn-info btn">Find</button>
                <div id="help_info" class="form-text">
                    *Try to find your friend with name<br>*Find chatroom with name;
                </div>
            </form>
        </div>
    </div>
@endsection
