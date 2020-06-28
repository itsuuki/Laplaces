@extends('layouts.app')
  <link rel="stylesheet" href="{{ mix('css/post.css') }}">
  <script type="text/javascript" src="//code.jquery.com/jquery-3.5.0.min.js"></script>
  <script src="{{ asset('/js/shop.js') }}" defer></script>
@section('content')
<div class="shop-main" id="shop-main">
<form method="POST" action="{{route('Shop.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card mb-4">
              <div class="card-header">
    <label for="name">
        店名
    </label>
    <input
        id="sname"
        name="sname"
        class="shop-sname {{ $errors->has('sname') ? 'is-invalid' : '' }}"
        value="{{ old('sname') }}"
        type="text"
    >
    </div>
    <div class="card-body">
      <p class="card-texts">
    <label for="sprice">
      平均価格
    </label>
    <input
    id="sprice"
    name="sprice"
    class="shop-sprice {{ $errors->has('sprice') ? 'is-invalid' : '' }}"
    value="{{ old('sprice') }}"
    type="text"
    >
    

    <label for="photo">
      電話番号  
    </label>
    <input
    id="photo"
    name="photo"
    class="shop-photo {{ $errors->has('photo') ? 'is-invalid' : '' }}"
    value="{{ old('photo') }}"
    type="text"
    >

    <label for="region">
      地域
    </label>
    <input
    id="region"
    name="region"
    class="shop-region {{ $errors->has('region') ? 'is-invalid' : '' }}"
    value="{{ old('region') }}"
    type="text"
    >
    

    <label for="store_in">
      店内飲食
    </label>
    <select name="store_in" class="store_in">
      <option value="あり">あり</option>
      <option value="なし">なし</option>
    </select>

    <label for="take_out">
      テイクアウト
    </label>
    <select name="take_out" class="take_out">
      <option value="あり">あり</option>
      <option value="なし">なし</option>
    </select>

    <label for="delivery">
      デリバリー
    </label>
    <select name="delivery" class="delivery">
      <option value="あり">あり</option>
      <option value="なし">なし</option>
    </select>
    <br>
    <label for="datail">
        店紹介
    </label>
    <textarea
        id="datail"
        name="datail"
        class="shop-datail {{ $errors->has('datail') ? 'is-invalid' : '' }}"
        rows="4"
    >{{ old('datail') }}</textarea>
    
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
    </p>
    </div>
    </div>
    <p>
      新規商品数<span id="press-button">1</span>個
    </p>
    <div class="oya">
    <div id="input_pluralBox" data-index="1">
      <div id="input_plural" class="input_plural[]">
          <label for="com-name">
            商品
          </label>
          <input
          id="name"
          name="name[]"
          class="name {{ $errors->has('name[]') ? 'is-invalid' : '' }}"
          value="{{ old('name[]') }}"
          type="text"
          >
          

          <label for="com-price">
            金額
          </label>
          <input
          id="price"
          name="price[]"
          class="price {{ $errors->has('price[]') ? 'is-invalid' : '' }}"
          value="{{ old('price[]') }}"
          type="text"
          >
          
          <label for="description">
              商品紹介
          </label>
          <textarea
              id="description"
              name="description[]"
              class="com-description"
              rows="4"
          >{{ old('description[]') }}</textarea>
          <input type="hidden" name="num[]">
          <input type="file" name="image[]">
          <div class="plus_min">
          <input type="button" value="＋" class="add pluralBtn[]">
          <input type="button" value="－" class="del pluralBtn[]">
          </div>
      </div>
    </div>
    </div>

    <div class="mt-5">
        <a class="btn btn-secondary" href="/">
            キャンセル
        </a>

        <button type="submit" class="btn btn-primary">
            登録する
        </button>
    </div>
</form>
<!-- <div class="backg">
  背景の色を変える
</div> -->
<!-- <p>
    背景色を…
    <input type="button" value="緑色に変更する" onclick="changeBoxColor('#008000');">
    <input type="button" value="青色に変更する" onclick="changeBoxColor('#0000ff');">
    <input type="button" value="黄色に変更する" onclick="changeBoxColor('#ffff00');">
    <input type="button" value="赤色に変更する" onclick="changeBoxColor('#ff0000');">
    <input type="button" value="淡い緑色に戻す" onclick="changeBoxColor('#ccffcc');">
</p> -->
</div>
</div>
</div>
</div>
@endsection