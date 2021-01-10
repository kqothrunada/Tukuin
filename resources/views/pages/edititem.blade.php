@extends('layouts.app')
@section('title', 'Edit Item')
@section('content')

<div class="container my-container">
  <h1 class="page-title">Edit Item Details</h1>
  <div class="edit-container">
    <img src="{{ asset('/storage/images/'.$item->image) }}" class="img-thumbnail"/>
    <form method="post" action={{ url('/doedititem') }} enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" id="id" name="id" value="{{$item->item_id}}">
      
      <div class="form-group">
        <label for="name">Pizza Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}" placeholder="Item Name">
        
        @if ($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name') }}</p>
        @endif
      </div>

      <div class="form-group">
        <label for="itemprice">Price</label>
        <div class="form-inline">
          <div class="input-group-prepend">
            <div class="input-group-text">Rp.</div>
          </div>

          <input type="number" class="form-control" id="price" name="price" value="{{ $item->price }}" placeholder="Price">
          
          @if ($errors->has('price'))
          <p class="text-danger">{{ $errors->first('price') }}</p>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="desc">Description</label>
        <input type="text" class="form-control" id="desc" name="desc" value="{{ $item->desc }}" placeholder="Item Description">

        @if ($errors->has('desc'))
        <p class="text-danger">{{ $errors->first('desc') }}</p>
        @endif
      </div>

      <div class="form-group">
        <label for="image">Item Image</label>
        <input type="file" class="form-control-file" name="image">
        
        @if ($errors->has('image'))
        <p class="text-danger">{{ $errors->first('image') }}</p>
        @endif
      </div>

      <button type="submit" class="btn btn-success">Edit Item</button>
    </form>
  </div>

</div>

@endsection