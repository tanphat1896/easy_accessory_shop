@extends('admin.layouts.master')

@section('title', 'Sản phẩm')

@section('content')
    <div class="ui dividing header">Quản lý sản phẩm</div>
    <table class="ui table">
        <thead>
        <tr>
            <th>#</th>
            <th>Mặt hàng</th>
            <th>Số lượng</th>
            <th>Ngày thêm</th>
            <th>Chi tiết</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>USB</td>
            <td>100</td>
            <td>22/2/2222</td>
            <td><a href="">Xem</a></td>
        </tr>
        </tbody>
    </table>
@endsection