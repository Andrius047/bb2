<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $fillable = [
        "name", "description", "connection_id", "date", "service_type", "repeat", "deleted"
    ];
}
