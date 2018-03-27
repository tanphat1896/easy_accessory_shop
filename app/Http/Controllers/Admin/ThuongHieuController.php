<?php

namespace App\Http\Controllers\Admin;

use App\Helper\StringHelper;
use App\Http\Requests\ThuongHieuFormRequest;
use App\ThuongHieu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThuongHieuController extends Controller
{

    public function index()
    {
        $brands = ThuongHieu::all();

        return view('admin.thuong_hieu.index')->withBrands($brands);
    }

    public function store(ThuongHieuFormRequest $request)
    {
        $name = $request->get('ten-thuong-hieu');
        $slug = StringHelper::toSlug($name);

        if (ThuongHieu::daTonTai($slug))
            return back()->with('errors', ["$name đã tồn tại"]);

        ThuongHieu::create([
            'ten_thuong_hieu' => $name,
            'slug' => $slug
        ]);

        return back()->with('success', 'Thêm thành công');
    }

    public function update(Request $request, $id)
    {
        $brand = ThuongHieu::findOrFail($id);

        $brand->ten_thuong_hieu = $request->get('ten-thuong-hieu');
        $brand->slug = StringHelper::toSlug($brand->ten_thuong_hieu);

        $brand->update();

        return back()->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('thuong-hieu-id');

        if (empty($ids))
            return back();

        $errors = $this->canDelete($ids);

        if (!empty($errors))
            return back()->with('errors', $errors);

        ThuongHieu::destroy($ids);

        return back()->with('success', 'Xóa thành công');
    }

    private function canDelete($ids) {
        $errors = [];

        foreach ($ids as $id) {
            $brand = ThuongHieu::findOrFail($id);

            if ($brand->khongCoSanPham())
                continue;

            $errors[] = "Thương hiệu " . $brand->ten_thuong_hieu . " còn sản phẩm";
        }

        return $errors;
    }
}
