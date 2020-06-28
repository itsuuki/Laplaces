@extends('layouts.app')
<link rel="stylesheet" href="{{ mix('css/user.css') }}">
<script src="{{ asset('/js/user.js') }}" defer></script>
@section('content')
<div class="all">
<div class="user-post-page">

    <div class="section s_07">
      <div class="accordion_one">
        <div class="accordion_header">{{ Auth::user()->name }}<div class="i_box"><i class="one_i"></i></div></div>
        <div class="accordion_inner">
          <div class="accordion_one">
            <div class="accordion_header">aaa<div class="i_box"><i class="one_i"></i></div></div>
            <div class="accordion_inner">
              <div class="accordion_one">
                <div class="accordion_header">
                  <a class="tab_btn" href="#item3">
                  お気に入り
                  </a></div>
                <div class="accordion_header">A_b</div>
              </div>
            </div>
          </div>
          <div class="accordion_one">
            <div class="accordion_header">お店の投稿一覧/注文一覧<div class="i_box"><i class="one_i"></i></div></div>
            <div class="accordion_inner">
              <div class="accordion_one">
                <div class="accordion_header">
                <a class="tab_btn is-active-btn" href="#item1">
                お店の投稿一覧
                </a></div>
                <div class="accordion_header">
                <a class="tab_btn" href="#item2">
                注文一覧
                </a></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="accordion_one">
        <div class="accordion_header">お店関連<div class="i_box"><i class="one_i"></i></div></div>
        <div class="accordion_inner">
          <div class="accordion_one">
            <div class="accordion_header">登録したお店<div class="i_box"><i class="one_i"></i></div></div>
              <div class="accordion_inner">
              @foreach ($shops as $shop)
                <div class="accordion_one">
                  <div class="accordion_header">
                    <a class="user-shop" href="/Shop/{{ $shop->id }}">
                      {{$shop->sname}}
                    </a>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="accordion_one">
            <div class="accordion_header">お店の投稿/新規お店の登録<div class="i_box"><i class="one_i"></i></div></div>
            <div class="accordion_inner">
              <div class="accordion_one">
                <div class="accordion_header">
                  <a class="shop-new" href="Shop/create">
                    店を登録する
                  </a></div>
                <div class="accordion_header">B_b</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        



                   
                
  <div class="user-datail-all">

    <div class="tab_item is-active-item" id="item1">
          @foreach ($shops as $shop)
            <div class="card mb-4">
                <div class="card-header">
                  {{$shop->sname}}
                </div>
                  @foreach ($posts as $post)
                      @if ($shop->id === $post->shop_id)
                          <div class="card-body">
                              <p class="card-text">
                                  {{ $post->post }}
                              </p>
                          </div>
                          @foreach ($images as $image)
                              @foreach ($image as $ima)
                                  @if ($post->id === $ima->post_id)
                                      <div class="card-bodys">
                                          <img src="{{ asset('storage/'. $ima->image) }}" width="100px" height="100px">
                                      </div>
                                  @endif
                              @endforeach
                          @endforeach
                          <form action="{{ action('PostController@destroy', $post->id) }}" id="form_{{ $post->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <a href="#" data-id="{{ $post->id }}" class="btn btn-danger btn-sm" onclick="deletePost(this);">削除</a>
                          </form>
                          <div class="line"></div>
                          @endif
                      @endforeach
                  </div>
                  @endforeach
          </div>


      <div class="tab_item" id="item2">
      @foreach ($reservations as $reservation)
      @foreach ($res_shops as $res_shop)
      @foreach ($res_shop as $re_sh)
          <div class="card mb-4">
            <div class="card-header">
              {{$re_sh->sname}}
            </div>
            @foreach ($commodities as $commodity)
            @foreach ($commodity as $com)
            
            <div class="card-body">
              <p class="card-text">
              {{ $com->name }}
              {{ $com->price }}円
              
            </p>
          </div>
          <div class="card-bodys">
          
          </div>
          @endforeach
          @endforeach
          </div>
          @endforeach
          @endforeach
          @endforeach
      </div>


    <div class="tab_item" id="item3">
      @if ($fav_shops !== null)
      @foreach ($fav_shops as $fav_sho)
      @foreach ($fav_sho as $fav)
        {{$fav->sname}}
      @endforeach
      @endforeach
      @endif
    </div>

  </div>
</div>
<div id="stop" class="scrollTop">
    <a href="">Top</a>
</div>
<div id="graydisplay"></div>
@endsection