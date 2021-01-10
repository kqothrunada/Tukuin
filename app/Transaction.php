<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'trans_id';
    protected $date = 'date';
    protected $cart_id = 'cart_id';

    public function cart() {
        return $this->belongsTo('App\Cart', 'cart_id');
    }
}
