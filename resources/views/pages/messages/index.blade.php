@extends('layouts.master')


@section('content')

        <div class="container profile">
                <a href="{{ route('profile.index') }}" class="btn btn-outline-primary profile">Profile</a>
        </div>
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
        @include('parts.form')

    {{ $messages->links() }}

@endsection
