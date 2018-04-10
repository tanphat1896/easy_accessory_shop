<?php

namespace App\Http\Controllers\Frontend;

use App\Customer;
use App\DanhGia;
use App\Helper\Logging;
use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function store(Request $request) {
        $data = $this->validateRating($request);

        if (empty($data))
            return back();

        $rating = DanhGia::where([
            ['customer_id', $data['customer_id'] ],
            ['san_pham_id', $data['product_id'] ]
        ])->first();

        empty($rating) ? $this->storeNewRating($data): $this->updateRating($rating, $data);

        $this->updateProductAverageRating($data['product_id']);

        return back();
    }

    private function validateRating(Request $request) {
        $email = $request->get('customer-email');
        $slug = $request->get('product-slug');
        $star = (int)$request->get('star');

        if (empty($email) || empty($slug))
            return false;

        $customer = Customer::whereEmail($email)->first();
        $product = SanPham::whereSlug($slug)->first();

        if (empty($customer) || empty($product))
            return false;

        return [
            'customer_id' => $customer->id,
            'product_id' => $product->id,
            'star' => $star
        ];
    }

    private function storeNewRating($data) {
        Logging::console('store');
        $rating = new DanhGia();

        $rating->customer_id = $data['customer_id'];
        $rating->san_pham_id = $data['product_id'];
        $rating->diem_danh_gia = $data['star'];

        $rating->save();
    }

    private function updateRating($rating, $data) {
        Logging::console('update');
        $rating->diem_danh_gia = $data['star'];

        $rating->save();
    }

    private function updateProductAverageRating($productId) {
        $product = SanPham::find($productId);
        $rates = DanhGia::where('san_pham_id', $productId);

        $totalRating = $rates->get()->count();

        if ($totalRating == 0)
            return;

        $totalPoint = $rates->sum('diem_danh_gia');
        $product->diem_danh_gia = (float)$totalPoint / $totalRating;

        $product->save();
    }
}
