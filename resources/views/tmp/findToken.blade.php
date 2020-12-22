@extends('tmp.base')

@section('title', $varForRender['title'])

@section('content')
    <div class="container">
        <div class="parent">
            <form class="block_form">
                <h3><label for="input" class="form-label">Find your Friend</label></h3>
                <input type="text" id="input" class="form-control" aria-describedby="help_info">
                <div id="help_info" class="form-text">
                    *Add your `TOKEN` please<br>Example: "5BC9A3A3-AD32-4C01-ACD9-683D9D179A3D";
                </div>
            </form>
        </div>
    </div>
@endsection
