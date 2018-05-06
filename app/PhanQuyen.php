<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
    public function matchedIds($collection) {
        $ids = array_column($collection->toArray(), 'id');
        return in_array($this->id, $ids);
    }
}
