<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    protected $table = "instagram_galleri";
    public $incrementings = false;
    public $timestamps = false;


    protected $fillable = ["id", "url"];
}
