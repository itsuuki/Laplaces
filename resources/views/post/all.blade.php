@extends('layouts.app')
<link rel="stylesheet" href="{{ mix('css/post_all.css') }}">
<script src="{{ asset('/js/favorite.js') }}" defer></script>
<script src="{{ asset('/js/post.js') }}" defer></script>
<!-- <link rel="stylesheet" href="{{ mix('css/shop.css') }}"> -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
        @foreach ($ushops as $ushop)
                    <div class="card mb-4">
                        <div class="card-header">
                          {{$ushop->sname}}
                        </div>
                          @foreach ($posts as $post)
                              @if ($ushop->id === $post->shop_id)
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
              </div>
          </div>
      </div>
      </div>
<div id="graydisplay"></div>
@endsection