@extends('layouts.app')
@section('title', 'Transaction Detail')
@section('content')
<div class="container transactiondetail-container">
  <img src={{asset('/storage/images/'.$transaction->cart->item->image)}} alt="item" class="img-thumbnail"/>

  <div class="itemDetail-container ">
    <h3>{{$transaction->cart->item->name}}</h3>
    <p>{{$transaction->cart->item->desc}}</p>
    <p>Rp. {{$transaction->cart->item->price}}</p>
    <p>Quantity : {{$transaction->cart->qty}}</p>
    <p>Total Price : Rp. {{$transaction->cart->total_price}}</p>
  </div>
</div>
@endsection