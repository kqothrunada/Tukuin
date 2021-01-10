@extends('layouts.app')
@section('title', 'Item Detail')
@section('content')

<div class="container">
  @if ($errors->any())
  <div class="alert alert-danger">
    {{ $errors->first() }}
  </div>
  @endif

  <div class="row align-items-center">
    <div class="col-sm-6">
      <img src={{ asset('/storage/images/'.$item->image) }} class="itemdetail-image" alt="item">
    </div>

    <div class="col-sm-6">
      <h3>{{$item->name}}</h3>
      <p>{{$item->desc}}</p><br>
      <p>Rp. {{$item->price}}</p>

      @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == "Member")
      <form class="form-inline mt-3" method="POST" action={{url('/addcart')}}>
        {{csrf_field()}}
        <div class="form-group">
          <label class="control-label col-sm-2" for="qty">Quantity</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="qty" name="qty">
            <input type="hidden" id="item_id" name="item_id" value="{{$item->item_id}}">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-cm-10">
            <button type="submit" class="btn btn-primary" style="cursor: pointer">Add to Cart</button>
          </div>
        </div>
      </form>
      @endif

    </div>
  </div>

</div>
@endsection