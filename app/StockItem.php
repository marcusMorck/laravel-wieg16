<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    protected $table = "stock_item";
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ["id", "is_in_stock"];

    public function products(){
        $this->belongsTo(Product::class);
    }
}
