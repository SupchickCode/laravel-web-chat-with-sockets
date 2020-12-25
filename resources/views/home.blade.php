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
            <div class="col-md-8">
                <h3>Name <span class="alert-token">{{ auth()->user()->name }}</span></h3>
                <h5>Token : <span class="alert-token">{{ auth()->user()->token }}</span></h5>

                <form class="mt-5" id="create-chatroom" action="{{ route('create_chatroom') }}" method="POST">
                    @csrf
                    <h5>Create your private chatroom</h5>

                    <label for="chatroom">Chatroom name</label>
                    <input name="chatroom" id="chatroom" type="text">

                    <label for="password">Chatroom password</label>
                    <input name="password" id="password" type="password">

                    <button type="submit" class="btn btn-success btn-sm">Create room</button>
                </form>

                <div class="mt-5" style="width: 300px">
                    <h5>My rooms</h5>
                    <ul class="list-group">
                        @forelse ($var_for_render['chatrooms'] as $room)
                            <li class="list-group-item"><a
                                    href="/chatroom/{{ $room->chatroom }}">{{ $room->chatroom }}</a>
                            </li>
                        @empty
                            <li class="list-group-item"><a href="#">You don't have any rooms =*(</a></li>
                        @endforelse
                    </ul>
                </div>

                {{-- LOGOUT BUTTOM --}}
                <div class="mt-5">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
