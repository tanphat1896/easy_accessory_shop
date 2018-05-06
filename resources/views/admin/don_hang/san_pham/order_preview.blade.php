<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        .wrapper {
            padding: 20px;
            font-family: Arial;
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
        <p><strong>HOA DON BAN HANG</strong></p>
        <p>Ngay: <strong>{{ date('Y-m-d H:i:s') }}</strong> </p>
        <p>Ma don hang: <strong>{{ $donHang->ma_don_hang }}</strong></p>
    </div>

    <div class="info">
        <p>Don vi ban hang: <strong>Easy Accessory Shop</strong></p>
        <p>Ten khach hang: <strong>{{ $donHang->vn_to_en($donHang->ten_nguoi_nhan) }}</strong></p>
        <p>Dia chi: {{ $donHang->vn_to_en($donHang->dia_chi) }}</p>
        <p>Dien thoai: {{ $donHang->dien_thoai }}</p>
        <p>Ghi chu: {{ $donHang->ghi_chu }}</p>
        <p>Hinh thuc thanh toan: {{ $donHang->vn_to_en($donHang->paymentType()) }}</p>
    </div>

    <div class="product-table">
        <table cellspacing="0">
            <thead>
            <tr>
                <th>STT</th>
                <th>Ten san pham</th>
                <th>So luong</th>
                <th>Don gia</th>
                <th>Khuyen mai</th>
                <th>Thanh tien</th>
            </tr>
            </thead>
            <tbody>
            @foreach($chiTietDonHangs as $stt => $chiTietDonHang)
                <tr>
                    <td>{{ $stt + 1 }}</td>
                    <td>{{ $donHang->vn_to_en($chiTietDonHang->tenSanPham()) }}</td>
                    <td>{{ $chiTietDonHang->so_luong }}</td>
                    <td>{{ number_format($chiTietDonHang->don_gia) }} VND</td>
                    <td>{{ $chiTietDonHang->giam_gia }}%</td>
                    <td>{{ number_format($chiTietDonHang->tongTien()) }} VND</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>