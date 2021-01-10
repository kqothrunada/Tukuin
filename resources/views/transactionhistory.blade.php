@extends('layouts.app')
@section('title', 'History')
@section('content')

<div class="container">
    @foreach ($transaction as $trans)
    <div class="card mt-5">
        <ul class="list-group list-group-flush list-transaction">
            <a href="/transactiondetail/{{$trans->trans_id}}" style="text-decoration: none;">
                <li class="list-group-item">
                    <p>Transaction at {{$trans->date}}</p>
                </li>
            </a>
        </ul>
    </div>
    @endforeach
</div>

@endsection