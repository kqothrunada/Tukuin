<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{
    public function index() {
        $cart = Cart::where([
            ['user_id', Auth::id()],
            ['status', 'Unpaid']
        ])->first();
        
        return view('cart')->with('cart', $cart);
    }

    public function addToCart(Request $request) {
        $existcart = Cart::where([
            ['user_id', Auth::id()],
            ['status', 'Unpaid']
        ])->first();
        
        if($existcart){
           return redirect(url()->previous())->withErrors(['You can only have 1 item for every 1 cart. Please do checkout first before adding a new item.']);
        } 
        else {
            $cart = new Cart(); 
            $price = Item::find($request->item_id)->price;

            $validate = $request->validate([
                'qty' => 'required|numeric',
            ]);

            $cart->user_id = Auth::id();
            $cart->item_id = $request->item_id;
            $cart->qty = $request->qty;
            $cart->status = "Unpaid";
            $cart->total_price = $request->qty * $price;
            $cart->save();

        }
        
        return redirect(url('/'));
    }

    public function update(Request $request) {
        $validate = $request->validate([
            'qty' => 'numeric',
        ]);

        $cart = Cart::find($request->cart_id);
        $price = Item::find($request->item_id)->price;
        $cart->qty = $request->qty;
        $cart->total_price = $request->qty * $price;

        $cart->save();
        return redirect(url('/'));
    }

    public function deleteCart($id) {
        $cart = Cart::find($id);

        $cart->delete();
        return redirect(url('cart'));
    }
}
