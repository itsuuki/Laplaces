@extends('layouts.app')
<link rel="stylesheet" href="{{ mix('css/post.css') }}">
<script src="{{ asset('/js/favorite.js') }}" defer></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($shops as $shop)
                <div class="card mb-4">
                    <div class="card-header">
                        <a class="user-shop" href="/Shop/{{ $shop->id }}">
                            {{ $shop->sname }}
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {{$shop->sprice}}
                        </p>
                    </div>
                </div>
            @endforeach
            <div id="stop" class="scrollTop">
                <a href="">Top</a>
            </div>
        </div>
    </div>
</div>
<div id="graydisplay"></div>
@endsection