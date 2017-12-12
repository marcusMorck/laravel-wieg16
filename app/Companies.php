<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{

    protected $fillable = ["id", "company_name"];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
