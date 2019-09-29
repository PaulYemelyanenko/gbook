@extends('layouts.master')


@section('content')
        @guest
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            </ul>
        @else
            <ul class="navbar-nav ml-auto">
               {{ Auth::user()->name }}
                        <a class="btn btn-outline-primary profile width" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>
            </ul>

            <div class="messages">
                @foreach($messages as $message)
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <span>{{ $message->name }}</span>
                                <span class="pull-right label label-info">{{ $message->created_at }}</span>
                            </h3>
                        </div>
                        <div class="panel-body">
                            {{ $message->message }}
                            <hr/>
                        </div>
                        @if(isset($message->answer) and !empty($message->answer))
                            <div class="container">

                                <div class="panel-heading">
                                    <p class="answer">Answer</p>
                                    <h3 class="panel-title">
                                        <span>Administration</span>
                                        <span class="pull-right label label-info">{{ $message->updated_at }}</span>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    {{ $message->answer }}
                                    <hr/>
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>
            <br/>

            {{ $messages->links() }}
        @endguest
@endsection
