@extends('layouts.app')
@section('title', 'Add Item')
@section('content')

<div class="container my-container">
  <h1 class="page-title">Add Item</h1>
  <form method="post" action={{url('/additem')}} enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
      <label for="name">Item Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Item Name">
      
      @if ($errors->has('name'))
      <p class="text-danger">{{ $errors->first('name') }}</p>
      @endif
    </div>

    <div class="form-group">
      <label for="itemprice">Price</label>
      <input type="number" class="form-control" id="price" name="price" placeholder="Price">
      
      @if ($errors->has('price'))
      <p class="text-danger">{{ $errors->first('price') }}</p>
      @endif
    </div>

    <div class="form-group">
      <label for="desc">Description</label>
      <input type="text" class="form-control" id="desc" name="desc" placeholder="Item Description">

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
    
    <button type="submit" class="btn btn-danger">Add Item</button>
  </form>
</div>

@endsection