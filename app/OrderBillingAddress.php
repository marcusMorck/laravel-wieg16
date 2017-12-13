<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBillingAddress extends Model
{
    protected $table = "order_billing_address";
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];

    protected $fillable = ["id", "customer_id", "email", "firstname", "lastname", "postcode",
        "street", "city", "telephone", "country_id", "address_type", "company", "country"];


    public function order(){
        return $this->belongsTo(Order::class);
    }
}
