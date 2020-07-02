@extends('layouts.app')
<link rel="stylesheet" href="{{ mix('css/post.css') }}">
<script src="{{ asset('/js/shop.js') }}" defer></script>
@section('content')
<form method="POST" action="{{route('Post.store')}}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="post-top">
    <div class="post-select-box">
      <label for="post-select-box" class="label post-select-box"><span class="label-desc">Choose a shop</span></label>
      <select name="shop_n" class="post-select" id="post-select-box">
        @foreach ($shops as $shop)
          <option value="{{ $shop->id }}">{{ $shop->sname }}</option>
        @endforeach
      </select>
    </div>
    <label for="post" class="post-label">
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
        <div name="img-rem[]" id="img-rem" class="img-rem">
          画像削除
        </div>
        <input type="hidden" name="nums[]">
      </div>
    </div>
    <div class="img-add">
      写真を追加する
    </div>
    <div class="wrapper">
      
      <a class="po-cal" href="/">
          キャンセル
      </a>
      <button type="submit" class="post-btn">
        投稿する
      </button>
    </div>
  </div>
</form>
@endsection