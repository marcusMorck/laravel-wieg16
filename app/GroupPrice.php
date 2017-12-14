<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupPrice extends Model
{
    protected $table = "group_prices";
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = ["id", "price", "group_id", "price_id"];

    public function products(){
        $this->belongsTo(Product::class);
    }
}
