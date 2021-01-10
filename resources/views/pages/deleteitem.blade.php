@extends('layouts.app')
@section('title', 'Delete Item')
@section('content')

<div class="container my-container">
  <h1 class="page-title">Delete Item</h1>

  <div class="item-bigcontainer">
    <img src={{asset('/storage/images/'.$item->image)}} class="img-thumbnail" />

    <div class="itemDetail-container">
      <h3>{{$item->name}}</h3>
      <p>{{$item->desc}}</p>
      <p>Rp. {{$item->price}}</p>
      <a class="btn btn-danger text-white" href="/destroy/{{$item->item_id}}">Delete</a>
    </div>

  </div>
</div>

@endsection