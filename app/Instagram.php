<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    protected $table = "instagram_galleri";
    public $timestamps = false;

    protected $fillable = ["id", "user_id", "link", "filter", "tags", "likes"];
}
