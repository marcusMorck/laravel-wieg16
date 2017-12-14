<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = ["id", "entity_id", "entity_type_id", "attribute_set_id",
    "type_id", "sku", "has_options", "required_options", "created_at", "updated_at",
        "status", "name", "amount_package", "price", "is_salable"];

    public function groupPrice(){
        $this->hasMany(GroupPrice::class);
    }

    public function stockItem(){
        $this->hasOne(StockItem::class);
    }
}
