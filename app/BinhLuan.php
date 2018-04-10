<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $fillable = ['customer_id', 'san_pham_id', 'noi_dung', 'parent_id'];
}
