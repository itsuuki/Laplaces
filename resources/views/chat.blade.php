@extends('layouts.app')
<!-- <script src=“https://js.pusher.com/3.2/pusher.min.js“></script> -->
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
<script src=“https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js”></script>
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<script src="{{ asset('/js/chat.js') }}" defer></script>
<link rel="stylesheet" href="{{ mix('css/chat.css') }}">
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        </div>
    </div>
 
    {{--  チャットルーム  --}}
    <div id="room" class="room">
        @foreach($messages as $key => $message)
            {{--   送信したメッセージ  --}}
                <div class="send" style="text-align: right">
                    <p>{{$message->message}}</p>
                </div>
 
            {{--   受信したメッセージ  --}}
                <div class="recieve" style="text-align: left">
                    <p>{{$message->message}}</p>
                </div>
        @endforeach
    </div>
 
    <form>
        {{ csrf_field() }}
        <textarea name="message" style="width:100%"></textarea>
        <button type="button" id="btn_send">送信</button>
    </form>
 
    <input type="hidden" name="send" value="{{$param['send']}}">
    <input type="hidden" name="recieve" value="{{$param['recieve']}}">
    <input type="hidden" name="login" value="{{\Illuminate\Support\Facades\Auth::id()}}">
 
</div>
 
@endsection

