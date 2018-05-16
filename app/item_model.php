<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item_model extends Model
{
    public $timestamps = false;

    protected $fillable = [

        "model", "deleted", "category_id"
    ];
}
