@extends('layouts.app')
<link rel="stylesheet" href="{{ mix('css/user.css') }}">
<script src="{{ asset('/js/user.js') }}" defer></script>
@section('content')
<div class="shop-reser-index">
  <div class="section reser-accode">
    <div class="reser_one">
      <div class="reser_header">一覧<div class="i_box"><i class="one_i"></i></div></div>
      <div class="reser_inner">
        <div class="reser_one">
          @foreach ($users as $user)
            <div class="reser_header">{{$user->name}}<div class="i_box"><i class="one_i"></i></div></div>
            <div class="reser_inner">
              <div class="reser_one">
              @foreach ($reservations as $reservation)
                @if ($user->name === $reservation->name)
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
                        <div class="reser-total_price">
                          合計金額{{ $reservation->total_price }}円
                        </div>
                        @foreach ($commodities as $commodity)
                        @if ($commodity->created_at === $reservation->created_at)
                            <div class="reser-name">
                              {{ $commodity->name }} {{ $commodity->remark }}個
                            </div>
                          @endif
                        @endforeach</div></div>
                      <div class="reser_header">
                            <a href="/chat/{{ $user->name }}/{{ $user->id }}">
                              chat
                            </a>
                      </div>
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
  </div>
</div>
@endsection