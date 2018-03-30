<?php

namespace App;

use App\Acme\Contract\CommonFunction;
use Illuminate\Database\Eloquent\Model;

class ThongSoKyThuat extends Model implements CommonFunction
{
    //
    public function getName() {
        return $this->ten_thong_so;
    }

    public function matchedId($id) {
        return $this->id == $id;
    }

    public function matchedIds($collection) {
        $ids = array_column($collection->toArray(), 'id');
        return in_array($this->id, $ids);
    }
}
