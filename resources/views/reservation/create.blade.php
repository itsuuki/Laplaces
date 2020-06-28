@extends('layouts.app')
<link rel="stylesheet" href="{{ mix('css/post_all.css') }}">
  <script type="text/javascript" src="//code.jquery.com/jquery-3.5.0.min.js"></script>
  <script src="{{ asset('/js/price.js') }}" defer></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Auth::user()->uphoto !== null && Auth::user()->uregion !== null)
<form method="POST" action="{{route('Reservation.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <select name="form" class="select" id="select-box1">
        @if ($shop->take_out === "ãã")
          <option value="テイクアウト">テイクアウト</option>
        @endif
        @if ($shop->store_in === "ãã")
          <option value="店内">店内</option>
        @endif
        @if ($shop->delivery === "ãã")
          <option value="デリバリー">デリバリー</option>
        @endif
    </select>
    <div id="people_input"></div>
    <select name="month">
        @foreach ($months as $month)
        <option value="{{ $month }}">{{ $month }}</option>
        @endforeach
    </select>月
    <select name="day">
        @foreach ($days as $day)
        <option value="{{ $day }}">{{ $day }}</option>
        @endforeach
    </select>日
    <select name="hour">
        @foreach ($hours as $hour)
        <option value="{{ $hour }}">{{ $hour }}</option>
        @endforeach
    </select>時
    <select name="minute">
        <option value="15">15</option>
        <option value="30">30</option>
        <option value="45">45</option>
        <option value="60">60</option>
    </select>分
    <div class="reser">
        @foreach ($commodity as $com)
            <div class="reser-form">
                {{ $com->name }}
                <div class="com-pri" data-price="{{$com->price}}">
                    {{ $com->price }}円
                </div>
                <input type="hidden" name="ids[]" value="{{$com->id}}">
                @foreach ($image as $ima)
                    @if ($com->id === $ima->commodity_id)
                        <div class="card-bodys">
                        <img src="storage/app/{{ $ima->image }}" width="100px" height="100px">
                        </div>
                    @endif
                    <input type="hidden" name="idss" value="{{$ima->id}}">
                @endforeach
                <label for="comm-name">
                        個数
                </label>
                    <input
                    id="remark"
                    name="remark[]"
                    class="remark"
                    value="{{ old('remark', 0) }}"
                    type="text"
                    >
                <input type="hidden" name="idsss" value="{{$shop_id}}">
                <input type="hidden" name="num[]">
                <p>
                    商品金額<span id="com-price"class="com-price">0</span>円
                </p>
            </div>
        @endforeach
    </div>
    <div class="total-price">
      合計金額<span id="total-price">0</span>円
    </div>

    <a class="btn btn-secondary" href="/">
        キャンセル
    </a>
    <button type="submit" class="btn btn-primary">
        登録する
    </button>
@else
<div>申し訳ありませんが、電話番号と住所を登録してください</div>
<a class="user-edit-go" href="/User/{{ Auth::user()->id }}/edit">
    登録を変更する
</a>
<a class="btn btn-secondary" href="/">
    キャンセル
</a>
@endif
@endsection