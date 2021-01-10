<?php

namespace App\Http\Controllers;

use Auth;
use App\Cart;
use App\Transaction;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class TransactionController extends Controller
{
    public function show() {
        $transactions = Transaction::all();
        return view('pages.transactions')->with('transactions', $transactions);
    }

    public function showdetail($id) {
        $transaction = Transaction::find($id);
        return view('pages.transactiondetail')->with('transaction', $transaction);
    }

    public function showhistory() {
        $trans = Transaction::whereHas('cart', function (Builder $query) {
            $query->where('user_id', Auth::id());
        })->get();
        return view('transactionhistory')->with('transaction', $trans);
    }

    public function checkout(Request $request) {
        $trans = new Transaction();
        $cart = Cart::find($request->cart_id);

        $cart->status = "Paid";
        $trans->cart_id = $request->cart_id;
        $trans->date = $request->date;

        $cart->save();
        $trans->save();
        return redirect(url('/'));
    }
}
