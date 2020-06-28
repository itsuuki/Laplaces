@extends('layouts.app')
  <script type="text/javascript" src="//code.jquery.com/jquery-3.5.0.min.js"></script>
  <script src="{{ asset('/js/shop.js') }}" defer></script>
@section('content')
<form method="POST" action="{{route('Commodity.store')}}" enctype="multipart/form-data">
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
    <p>
      新規商品数<span id="press-button">1</span>個
    </p>
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
        <input type="button" value="＋" class="add pluralBtn[]">
        <input type="button" value="－" class="del pluralBtn[]">
        <input type="hidden" name="num[]">
        <input type="file" name="image[]" class="com-image-add {{ $errors->has('image') ? 'is-invalid' : '' }}" value="{{ old('image') }}">
      </div>
    </div>
    <a class="btn btn-secondary" href="{{ action('ShopController@show', $id) }}">
        キャンセル
    </a>
    <!-- <button class="aa">a</button> -->
    <button type="submit" class="btn btn-primary">
        更新する
    </button>
    <input type="hidden" name="id" value="{{$id}}">
@endsection