@extends('layouts.app')
@section('title', 'Cart')
@section('content')

@if ($cart == null)
<div class="container">
    <div class="alert alert-danger">
        Cart is empty!
    </div>
</div>
@else
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <img src={{asset('/storage/images/'.$cart->item->image)}} class="itemdetail-image" alt="item">
        </div>
        <div class="col-lg-6">
            <h4>{{$cart->item->name}}</h4>
            <p>Rp. {{$cart->item->price}}</p>
            <p>Quantity: {{$cart->qty}}</p>

            <form class="form-inline" method="POST" action={{ url('/update') }}>
                {{csrf_field()}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="qty">Quantity</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="qty" name="qty">
                        <input type="hidden" id="item_id" name="item_id" value="{{ $cart->item->item_id }}">
                    </div>
                </div>

                <div class="form-group mt-2 mb-2">
                    <div class="col-sm-offset-2 col-cm-10">
                        <input type="hidden" id="cart_id" name="cart_id" value="{{ $cart->cart_id }}">
                        <button type="submit" class="btn btn-primary" style="cursor: pointer">Update Quantity</button>
                        <a class="btn btn-danger" style="cursor: pointer" href="/deletecart/{{$cart->cart_id}}">
                            Delete from Cart
                        </a>
                    </div>
                </div>
            </form>
            <div class="container">
                <form method="POST" action={{ url('/checkout') }}>
                    {{ csrf_field() }}
                    <input type="hidden" id="cart_id" name="cart_id" value="{{ $cart->cart_id }}">
                    <input type="hidden" name="date" id="date" value="{{ date('Y-m-d H:i:s') }}">
                    <button type="submit" class="btn btn-success" style="cursor: pointer">Checkout</button>
                </form>
            </div>
        </div>
    </div>
</div><br>
@endif

@endsection