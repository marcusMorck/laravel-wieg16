<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twitter extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    
    protected $table = 'twitter';

    protected $fillable = ['id', 'created_at', 'text'];
}
