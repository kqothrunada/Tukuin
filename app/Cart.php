<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'cart_id';
    protected $user_id = 'user_id';
    protected $pizza_id = 'item_id';
    protected $qty = 'qty';
    protected $total_price = 'total_price';

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function item() { 
        return $this->belongsTo('App\Item', 'item_id');
    }

    public function transaction() {
        return $this->hasOne('App\Transaction');
    }
}
