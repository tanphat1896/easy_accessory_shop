<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThuongHieuFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ten-thuong-hieu' => 'required|max:255'
        ];
    }

    public function messages() {
        return [
            'ten-thuong-hieu.required' => 'Tên thương hiệu không được bỏ trống',
            'ten-thuong-hieu.max' => 'Tên thương hiệu phải ít hơn 255 ký tự'
        ];
    }
}
