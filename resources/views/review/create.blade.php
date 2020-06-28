@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/reviews.css') }}">
<script type="text/javascript" src="//code.jquery.com/jquery-3.5.0.min.js"></script>
<script src="{{ asset('/js/reviews.js') }}" defer></script>
@section('content')
<form method="POST" action="{{route('Review.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="post-top">


      <div class="select-box">
        <label for="select-box1" class="label select-box1"><span class="label-desc">Choose a review</span></label>
        <select name="evaluation" class="select" id="select-box1">
          <option value="1">1(よくない)</option>
          <option value="2">2(あまりよくない)</option>
          <option value="3">3(普通)</option>
          <option value="4">4(よい)</option>
          <option value="5">5(最高)</option>
        </select>
      </div>

<label for="detail">
    レビュー文
</label>
<textarea
    id="detail"
    name="detail"
    class="review-detail"
    rows="4"
>{{ old('detail') }}</textarea>

<!-- <label for="detailaaa">
{{$shop_id->id}}
</label> -->
    
<input type="hidden" name="id" value="{{$shop_id->id}}">

<div class="review-submit-btn">
<a class="btn btn-secondary" href="/">
    キャンセル
</a>

<button type="submit" class="btn btn-primary">
    登録する
</button>
</div>
</form>
</div>
@endsection