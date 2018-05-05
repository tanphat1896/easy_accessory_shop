<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['admin_id', 'name', 'description', 'time'];

    public $timestamps = [];
}
