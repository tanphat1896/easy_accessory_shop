<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        .wrapper {
            padding: 20px;
            font-family: 'DejaVu Sans';
            font-size: 14px;
        }
        p {
            margin: 5px;
        }
        .date {
            font-size: 12px;
        }

        .header-wrapper {
            width: 100%;
            text-align: center;
        }

        table {
            width: 100%;
            border-radius: 5px;
            text-align: center;
        }

        th {
            background-color: #F9FAFB;
        }

        th, td {
            padding: 5px;
            border-color: lightgray;
            border-style: solid;
            border-width: 1px 1px 0 0;
        }

        th:first-child, td:first-child {
            border-left: 1px solid lightgray;
        }

        tr:last-child td:last-child {
            border-bottom: 1px solid lightgray;
        }

        .right-aligned {
            text-align: right;
        }

        .left-aligned {
            text-align: left;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="date">{{ date('Y-m-d') }}</div>
    <div class="header-wrapper">
        <p><strong>HÓA ĐƠN BÁN HÀNG</strong></p>
        <p>Ngày: <strong>{{ date('Y-m-d H:i:s') }}</strong> </p>
        <p>Mã đơn hàng: <strong>{{ $donHang->ma_don_hang }}</strong></p>
    </div>

    <div class="info">
        <p>Đơn vị bán hàng: <strong>Easy Accessory Shop</strong></p>
        <p>Tên khách hàng: <strong>{{ $donHang->ten_nguoi_nhan }}</strong></p>
        <p>Địa chỉ: {{ $donHang->dia_chi }}</p>
        <p>Điện thoại: {{ $donHang->sdt_nguoi_nhan }}</p>
        <p>Ghi chú: {{ $donHang->ghi_chu }}</p>
        <p>Hình thức thanh toán: {{ $donHang->paymentType() }}</p>
    </div>

    <div class="product-table">
        <table cellspacing="0">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Khuyến mãi</th>
                <th>Thành tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($chiTietDonHangs as $stt => $chiTietDonHang)
                <tr>
                    <td>{{ $stt + 1 }}</td>
                    <td>{{ $chiTietDonHang->tenSanPham() }}</td>
                    <td>{{ $chiTietDonHang->so_luong }}</td>
                    <td>{{ number_format($chiTietDonHang->don_gia) }} đ</td>
                    <td>{{ $chiTietDonHang->giam_gia }}%</td>
                    <td>{{ number_format($chiTietDonHang->tongTien()) }} đ</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6" class="right-aligned">
                    <p>Tổng tiền hàng (đã có thuế): <strong>{{ number_format($donHang->tong_tien) }} đ</strong></p>
                    <p>Thuế GTGT (10%): <strong>{{ number_format($donHang->tong_tien * 0.1) }} đ</strong></p>
                    <p>Phí vận chuyển: <strong>{{ number_format($donHang->phi_van_chuyen) }} đ</strong></p>
                    <p>Tổng cộng: <strong>{{ number_format($donHang->tong_tien + $donHang->phi_van_chuyen) }} đ</strong></p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>