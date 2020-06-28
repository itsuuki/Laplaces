@extends('layouts.app')
<link rel="stylesheet" href="{{ mix('css/post.css') }}">
<script src="{{ asset('/js/shop.js') }}" defer></script>
@section('content')
<form method="POST" action="{{route('Post.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="post-top">
    お店選択<select name="shop_n">
      @foreach ($shops as $shop)
        <option value="{{ $shop->id }}">{{ $shop->sname }}</option>
      @endforeach
    </select>
    <label for="post">
        投稿内容
    </label>
    <textarea
        id="post"
        name="post"
        class="pos-detl {{ $errors->has('post') ? 'is-invalid' : '' }}"
        rows="4"
    >{{ old('post') }}</textarea>
    @if ($errors->has('post'))
      <div class="invalid-feedback">
          {{ $errors->first('post') }}
      </div>
    @endif

    <div id="img-box" data-ind="1">
      <div class="shop-img">
        <input type="file" name="img[]" id="myfile">
        <!-- <img id="img[]" style="width:100px;height:100px;" /> -->
        <!-- <div class="img-show">
          
        </div> -->
        <div name="img-rem[]" id="img-rem" class="img-rem">
          画像削除
        </div>
        <input type="hidden" name="nums[]">
      </div>
    </div>
    <div class="img-add">
      写真を追加する
    </div>
    <div class="mt-5">
      
      <button type="submit" class="post-btn">
        <span>やりましたよ必死に!</span><span>必死でやりましたか？</span>
      </button>
    </div>
    <a class="po-cal" href="/">
        キャンセル
    </a>
  </div>
</form>
@endsection