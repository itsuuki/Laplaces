@extends('layouts.app')
@section('content')
@foreach ($shops as $shop)
@foreach ($shop as $shp)
{{$shp->sname}}
@endforeach
@endforeach
@foreach ($commodities as $commodity)
    @foreach ($commodity as $com)
      {{ $com->name }}
      {{ $com->price }}
      <input type="hidden" name="ids[]" value="{{$com->id}}">
      @foreach ($images as $image)
        @foreach ($image as $ima)
          @if ($com->id === $ima->commodity_id)
          <div class="card-bodys">
            <img src="{{ asset('storage/'. $ima->image) }}" width="100px" height="100px">
          </div>
          @endif
            <input type="hidden" name="idss" value="{{$ima->id}}">
            @endforeach
          @endforeach
      @endforeach
@endforeach
@endsection