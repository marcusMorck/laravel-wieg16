<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $incrementing = false;
    protected $guarded = [];

    protected $fillable = ["id", "increment_id", "created_at", "updated_at", "customer_id",
        "customer_email", "status", "marking", "grand_total", "sub_total", "tax_amount",
        "billing_address_id", "shipping_method", "shipping_amount", "shipping_tax_amount",
        "shipping_description"];

    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }

    public function orderBillingAddress(){
        return $this->hasOne(OrderBillingAddress::class);
    }

    public function orderShippingAddress(){
        return $this->hasOne(OrderShippingAddress::class);
    }
}
