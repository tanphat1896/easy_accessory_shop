<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $fillable = ['name', 'san_pham_id', 'noi_dung', 'parent_id'];

    public function children() {
        return $this->hasMany(BinhLuan::class, 'parent_id', 'id');
    }
}
