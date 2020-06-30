@extends('layouts.app')
<link rel="stylesheet" href="{{ mix('css/user.css') }}">
<script src="{{ asset('/js/user.js') }}" defer></script>
<script src="{{ asset('/js/delete-com.js') }}" defer></script>
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
                    <div class = "post-oya">
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
                            <a class="deleteTarget-post" id="deleteTarget-post" data-post-id="{{$post->id}}">
                              削除
                            </a>
                          <div class="line"></div>
                        </div>
                          @endif
                      @endforeach
                  </div>
                  @endforeach
          </div>


      <div class="tab_item" id="item2">

      <div class="section reser-accode">
        <div class="reser_one">
          <div class="reser_header">一覧<div class="i_box"><i class="one_i"></i></div></div>
          <div class="reser_inner">
            <div class="reser_one">
              @foreach ($reser_shops as $reser_shop)
                <div class="reser_header">{{$reser_shop->sname}}<div class="i_box"><i class="one_i"></i></div></div>
                <div class="reser_inner">
                  <div class="reser_one">
                  @foreach ($reservations as $reservation)
                    @if ($reser_shop->sname === $reservation->sname)
                      <div class="reser_header">{{ $reservation->created_at }}<div class="i_box"><i class="one_i"></i></div></div>
                      <div class="reser_inner">
                        <div class="reser_one">
                          <div class="reser_header">
                            <div class="reser-top-items">
                            <div class="reser-time">
                            注文日付{{ $reservation->month }}月{{ $reservation->day }}日{{ $reservation->hour }}時{{ $reservation->minute }}分
                            </div>
                            <div class="reser-form">
                            種類{{ $reservation->form }}
                            </div>
                            <div class="reser-people">
                            @if ($reservation->people !== null)
                            人数{{ $reservation->people }}人
                            @else
                            人数0人
                            @endif
                            </div>
                            @foreach ($commodities as $commodity)
                            @if ($commodity->created_at === $reservation->created_at)
                                <div class="reser-name">
                                {{ $commodity->name }} {{ $commodity->remark }}個
                                </div>
                              @endif
                            @endforeach</div></div>
                          <div class="reser_header">chat</div>
                        </div>
                      </div>
                    @endif
                  @endforeach
                  </div>
                </div>
                </div>
              @endforeach
            </div>
          </div>
        <!-- </div> -->
      </div>
    </div>
      <!-- </div> -->

      
      <!-- </div> -->


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