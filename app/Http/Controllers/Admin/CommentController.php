<?php

namespace App\Http\Controllers\Admin;

use App\BinhLuan;
use App\Helper\AuthHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store(Request $request) {
        $comment = new BinhLuan();
        $comment->name = AuthHelper::adminName();
        $comment->san_pham_id = $request->get('product-id');
        $comment->parent_id = (int)$request->get('parent');
        $comment->noi_dung = $request->get('content');

        $comment->save();

        return back();
    }

    public function update(Request $request, $id) {
        $comment = BinhLuan::findOrFail($id);
        $comment->approved = (int)$request->get('approve') % 2;
        $comment->save();

        return back();
    }

    public function destroy($id) {
        BinhLuan::findOrFail($id)->delete();
        return back();
    }
}
