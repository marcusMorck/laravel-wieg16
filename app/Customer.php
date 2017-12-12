<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];

    protected $fillable = ["id", "firstname", "lastname", "email", "gender", "customer_activated",
        "group_id", "customer_company", "default_billing", "default_shipping", "is_active",
        "created_at", "updated_at", "customer_invoice_email", "customer_extra_text", "customer_due_date_period",
    "company_id"];

    public function address(){
        return $this->hasOne(Address::class);
    }

    public function companies(){
        return $this->hasMany(Companies::class);
    }

}
