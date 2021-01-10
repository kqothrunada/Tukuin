<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'item_id';
    protected $name = 'name';
    protected $desc = 'desc';
    protected $price = 'price';
    protected $image = 'image';
    public $timestamps = false;

    public function cart() {
        return $this->hasOne('App\Cart');
    }
}
