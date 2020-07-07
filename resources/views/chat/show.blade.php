@extends('layouts.app')
<!-- <link href="{{ asset('css/post.css') }}" rel="stylesheet"> -->
<link rel="stylesheet" href="{{ mix('css/post.css') }}">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                {{ $chats->title }}
            </div>
        <div class="card-body">
            <p class="card-text">
                {{ $chats->message }}
            </p>
        </div>
      </div>
          <form>
            <input class="back-btn" value="戻る" onClick="history.back()">
          </form>
    </div>
    </div>
    </div>
@endsection