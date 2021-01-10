@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="container">
  <h3>Everything is guaranteed fresh!</h3><br>

  @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == "Seller")
    <div class="container">
      <a class="btn btn-primary" href="/addnewitem" role="button">Add Item</a>
    </div>
  @else
    <div class="container">
      <form class="form-inline" action={{ url('/item/search') }} method="GET">
          <div class="form-group">
              <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search Item" value="{{ old('search') }}">
              <button class="btn btn-primary" type="submit">Search</button>
          </div>
      </form>
    </div>
  @endif

  <br>
    <div class="home-container">
      <div class="row justify-content-center">
          @foreach ($items as $item)
            <div class="card m-2" style="width: 18rem;">
              <a href="/itemdetail/{{ $item->item_id }}" style="text-decoration: none;" class="text-dark">
                <img src={{asset('/storage/images/'.$item->image)}} alt="item" class="card-img-top">
                  <div class="card-body">
                    <h5>{{$item->name}}</h5>
                    <p>Rp. {{$item->price}}</p>
                    @if (\Illuminate\Support\Facades\Auth::check() && 
                    \Illuminate\Support\Facades\Auth::user()->role == "Seller")
                      <a class="btn btn-sm btn-success text-white" href="/edit/{{$item->item_id}}">Edit</a>
                      <a class="btn btn-sm btn-danger text-white" href="/delete/{{$item->item_id}}">Delete</a>
                    @endif
                  </div>
            </div><br></a>
          @endforeach
      </div>
      {{ $items->links() }}
    </div>
</div>

@endsection