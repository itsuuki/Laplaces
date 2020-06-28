@extends('layouts.app')
@section('content')
<form method="POST"  action="{{url('User/update')}}" enctype="multipart/form-data">
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
        登録情報変更
      </div>
        <div class="card-body">
            <p class="card-txt">
      <label for="name">
          名前
      </label>
      <input
          id="name"
          name="name"
          class="name"
          value="{{ old('name', Auth::user()->name) }}"
          type="text"
      >
      <label for="email">
        email
      </label>
      <input
      id="email"
      name="email"
      class="email"
      value="{{ old('email', Auth::user()->email) }}"
      type="text"
      >
      <label for="uphoto">
        電話番号
      </label>
      <input
      id="uphoto"
      name="uphoto"
      class="user-uphoto"
      value="{{ old('uphoto', Auth::user()->uphoto) }}"
      type="text"
      >
      <label for="uregion">
        住所
      </label>
      <input
      id="uregion"
      name="uregion"
      class="user-uregion"
      value="{{ old('uregion', Auth::user()->uregion) }}"
      type="text"
      >
      </p>
    </div>
    </div>
    <div class="mt-5">
      <a class="btn btn-secondary" href="{{ action('UserController@show', Auth::user()->id) }}">
        キャンセル
      </a>
      <button type="submit" class="btn btn-primary">
        更新する
      </button>
      <input type="hidden" name="id" value="{{Auth::user()->id}}">
    </div>
    </div>
    </div>
    </div>
</form>
@endsection