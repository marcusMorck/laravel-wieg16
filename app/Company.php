<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'companies';
    public $timestamps = false;

    protected $fillable = ['id', 'company_name'];
    protected $guarded = [];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
