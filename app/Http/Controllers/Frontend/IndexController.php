<?php

namespace App\Http\Controllers\Frontend;

use App\Acme\Behavior\GetProduct;
use App\SanPham;
use App\Slider;
use App\TinTuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use GetProduct;
    public function index() {
        $ssds = SanPham::whereLoaiSanPhamId(1)->limit(6)->get();

        $sliders = Slider::all();

        $news_s = TinTuc::orderBy('created_at', 'desc')->limit(4)->get();

        $saleProducts = $this->getSaleProducts();

        $newProducts = $this->getNewProducts();

        return view('index', compact('ssds', 'sliders', 'news_s', 'saleProducts', 'newProducts'));
    }

    public function showAllNews() {
        $news_s = TinTuc::orderBy('created_at', 'desc')->paginate(15);

        return view('frontend.news.all_news', compact('news_s'));
    }

    public function showNews($slug) {
        $news = TinTuc::whereSlug($slug)->firstOrFail();

        $otherNews_s = TinTuc::where('id', '<>', $news->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('frontend.news.news_show', compact('news', 'otherNews_s'));
    }
}
