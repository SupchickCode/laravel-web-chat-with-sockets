@extends('tmp.base')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">

            <div class="mt-5">
                <h3>Name <span class="alert-token">{{ auth()->user()->name }}</span></h3>
                <h5>Token : <span class="alert-token">{{ auth()->user()->token }}</span></h5>
            </div>

            {{-- LOGOUT BUTTOM --}}
            <div class="mt-1">
                <a class="btn btn-info" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

        </div>

        <form style="width:300px;" class="mt-5 form-group" id="create-chatroom" action="{{ route('create_chatroom') }}"
            method="POST">
            @csrf
            <h5>Create your private chatroom</h5>
            <div class="form-group mt-3">
                <label for="chatroom">Chatroom name</label>
                <input name="chatroom" id="chatroom" type="text" class="form-control" placeholder="Enter chatroom name">
                <small id="emailHelp" class="form-text text-muted">Please enter name for your room</small>
            </div>
            <div class="form-group mt-3">
                <label for="chatroom">Chatroom password</label>
                <input name="password" id="password" type="password" class="form-control"
                    placeholder="Enter chatroom password">
            </div>
            <button type="submit" class="mt-3 btn btn-success btn-sm">Create room</button>
        </form>

        <div class="d-block mt-5" style="width: 300px">
            <h5>Rooms</h5>
            <ul class="list-group">
                @forelse ($var_for_render['chatrooms'] as $room)
                    <li class="list-group-item"><a href="/chatroom/{{ $room->chatroom }}">{{ $room->chatroom }}</a>
                        <a class="ml-auto p-3" href="/chatroom/remove/{{ $room->chatroom }}">&#10006;</a>
                    </li>
                @empty
                    <li class="list-group-item"><a href="#">You don't have any rooms =*(</a></li>
                @endforelse
            </ul>
        </div>
    </div>
    </div>
@endsection
