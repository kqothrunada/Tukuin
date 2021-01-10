@extends('layouts.app')
@section('title', 'All Transactions')
@section('content')

<div class="container">
  <div class="card mt-5">
    <ul class="list-group list-group-flush list-transaction">
      @foreach ($transactions as $transaction)
      
      <a href="/transactiondetail/{{$transaction->trans_id}}" class="text-dark" style="text-decoration: none;">
        <li class="list-group-item">
          <p>Transaction at {{$transaction->date}}</p>
          <p>UserID : {{$transaction->cart->user_id}}</p>
          <p>Username : {{$transaction->cart->user->username}}</p>
        </li>
      </a>
      
      @endforeach
    </ul>
  </div>
</div>
@endsection