<?php

namespace App\Http\Controllers\Admin;

use App\Helper\AuthHelper;
use App\Helper\Logging;
use App\Helper\PagingHelper;
use App\Helper\StringHelper;
use App\Http\Requests\ThuongHieuFormRequest;
use App\NhanVien;
use App\ThuongHieu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThuongHieuController extends Controller {

    public function index(Request $request) {
        if (!NhanVien::find(AuthHelper::adminId())->checkQuyen(2))
        {
            return view('admin.errors.404');
        }

        $brandName = $request->get('name') ?: '';
        $brandName = StringHelper::toSlug($brandName);

        $brands = empty($brandName)
            ? ThuongHieu::paginate(PagingHelper::PER_PAGE)
            : ThuongHieu::where('slug', 'like', "%$brandName%")
                ->paginate(PagingHelper::PER_PAGE);

        return view('admin.thuong_hieu.index')->withBrands($brands);
    }

    public function store(ThuongHieuFormRequest $request) {
        $name = $request->get('ten-thuong-hieu');
        $slug = StringHelper::toSlug($name);

        if (ThuongHieu::daTonTai($slug))
            return back()->with('errors', ["$name đã tồn tại"]);

        ThuongHieu::create([
            'ten_thuong_hieu' => $name,
            'slug' => $slug
        ]);

        Logging::saveActivity('Vừa tạo thương hiệu ' . $name);

        return back()->with('success', 'Thêm thành công');
    }

    public function update(Request $request, $id) {
        $brand = ThuongHieu::findOrFail($id);

        $brand->ten_thuong_hieu = $request->get('ten-thuong-hieu');
        $brand->slug = StringHelper::toSlug($brand->ten_thuong_hieu);

        $brand->update();

        Logging::saveActivity('Cập nhật thương hiệu ' . $brand->ten_thuong_hieu);

        return back()->with('success', 'Cập nhật thành công');
    }

    public function destroy(Request $request) {
        $ids = $request->get('thuong-hieu-id');

        if (empty($ids))
            return back();

        $errors = $this->canDelete($ids);

        if (!empty($errors))
            return back()->with('errors', $errors);

        ThuongHieu::destroy($ids);

        Logging::saveActivity('Xóa thương hiệu');

        return back()->with('success', 'Xóa thành công');
    }

    private function canDelete($ids) {
        $errors = [];

        if (!is_array($ids)) {
            $brandIds[] = $ids;
            $ids = $brandIds;
        }

        foreach ($ids as $id) {
            $brand = ThuongHieu::findOrFail($id);

            if ($brand->khongCoSanPham())
                continue;

            $errors[] = "Thương hiệu " . $brand->ten_thuong_hieu . " còn sản phẩm";
        }

        return $errors;
    }
}
