<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_type extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "type", "deleted"
    ];
}