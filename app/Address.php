<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "Address";
    public $incrementing = false;

    protected $guarded = [];

    protected $fillable = ["id", "customer_id", "customer_address_id", "email",
        "firstname", "lastname", "postcode", "street", "city", "telephone", "country_id",
        "address_type", "company", "country", "created_at", "updated_at"];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
