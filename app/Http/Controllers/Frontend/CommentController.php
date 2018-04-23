<?php

namespace App\Http\Controllers\Frontend;

use App\BinhLuan;
use App\Customer;
use App\Helper\StringHelper;
use App\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store(Request $request) {

        $data = $this->validateComment($request);
        if (empty($data))
            return response()->json(false);

        BinhLuan::create($data);

        return response()->json(true);
    }

    private function validateComment(Request $request) {
        $email = $request->get('email') ?: '';
        $slug = $request->get('slug') ?: '';
        $content = $request->get('content') ?: '';

        $product = SanPham::whereSlug($slug)->first();
        $customer = Customer::whereEmail($email)->first();
        if (empty($product) || empty($customer) || empty($content))
            return false;

        return [
            'name' => $customer->name,
            'san_pham_id' => $product->id,
            'noi_dung' => $content,
            'parent_id' => null
        ];
    }
}
