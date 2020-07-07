@extends('layouts.app')
<!-- <script src=“https://js.pusher.com/3.2/pusher.min.js“></script> -->
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
<!-- <script src=“https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js”></script>
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<script src="{{ asset('/js/chat.js') }}" defer></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/comment.js') }}" defer></script>
<!-- <script src="{{ asset('/js/shop.js') }}" defer></script> -->
<link rel="stylesheet" href="{{ mix('css/chat.css') }}">
@section('content')
<form method="POST" action="{{route('Chat.store')}}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="chat-top">
    <label for="title">
        <strong>タイトル</strong>
    </label>
    <input
        id="title"
        name="title"
        class="title"
        value="{{ old('title') }}"
        type="text"
    >
    <label for="message">
        <strong>お問い合わせ</strong>
    </label>
    <textarea
        id="message"
        name="message"
        class="message"
        rows="4"
    >{{ old('detail') }}</textarea>

    <input type="hidden" name="user_id" value="{{$recieve}}">
    <input type="hidden" name="shop_id" value="{{$shop_id}}">
    <input type="hidden" name="shop_name" value="{{$shop}}">
    <input type="hidden" name="user_name" value="{{$user_name}}">

    <div class="wrapper">
      <a class="chat-can" href="/">
          キャンセル
      </a>
      <button type="submit" class="chat-sub">
          送る
      </button>
    </div>
  </div>
</form>
@endsection