<?php

namespace App;

use App\Helper\AuthHelper;
use App\Helper\StringHelper;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{

    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    public static function createFrom(array $data) {
        $news = new TinTuc();
        return self::assignData($news, $data);
    }

    private static function assignData($news, array $data) {
        $news->tieu_de = $data['title'];
        $news->noi_dung = $data['description'];
        $news->slug = StringHelper::toSlug($data['title'])
            . "-" . ($news->id ?: (TinTuc::all()->count() + 1));
        $news->thumb = $data['filepath'] ?: '';
        $news->admin_id = $news->admin_id ?: AuthHelper::adminId();

        return $news;
    }

    public static function store(array $data) {
        $news = self::createFrom($data);
        return $news->save() ? $news: false;
    }

    public static function updateNews($news, array $data) {
        $news = self::assignData($news, $data);
        return $news->update();
    }
}
