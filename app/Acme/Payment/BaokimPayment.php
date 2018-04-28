<?php
/**
 * Created by PhpStorm.
 * User: tanphat
 * Date: 4/24/18
 * Time: 4:44 PM
 */

namespace App\Acme\Payment;


use App\Acme\Template\OnlinePayment;

class BaokimPayment extends OnlinePayment {

    public function __construct($paymentGate) {
        $this->init($paymentGate);
    }

    public function buildUrl($data) {
        // TODO: Implement buildUrl() method.
    }

    public function verify($data) {
        // TODO: Implement verify() method.
    }

    /**
     * Hàm xây dựng url chuyển đến BaoKim.vn thực hiện thanh toán, trong đó có tham số mã hóa (còn gọi là public key)
     * @param $order_id				Mã đơn hàng
     * @param $business 			Email tài khoản người bán
     * @param $total_amount			Giá trị đơn hàng
     * @param $shipping_fee			Phí vận chuyển
     * @param $tax_fee				Thuế
     * @param $order_description	Mô tả đơn hàng
     * @param $url_success			Url trả về khi thanh toán thành công
     * @param $url_cancel			Url trả về khi hủy thanh toán
     * @param $url_detail			Url chi tiết đơn hàng
     * @return url cần tạo
     */
    public function createRequestUrl($order_id, $business, $total_amount, $shipping_fee = 0, $tax_fee = 0, $order_description = '')
    {
        $url = config('payment.url.return_url');
        $params = array(
            'merchant_id'		=>	$this->merchant_id,
            'order_id'			=>	strval($order_id),
            'business'			=>	strval($business),
            'total_amount'		=>	strval($total_amount),
            'shipping_fee'		=>  strval($shipping_fee),
            'tax_fee'			=>  strval($tax_fee),
            'order_description'	=>	strval($order_description),
            'url_success'		=>	$url,
            'url_cancel'		=>	$url,
            'url_detail'		=>	$url,
        );
        ksort($params);

        $str_combined = implode('', $params);
        $params['checksum'] = strtoupper(hash_hmac('sha1', $str_combined, $this->secure_pass));

        //Kiểm tra  biến $redirect_url xem có '?' không, nếu không có thì bổ sung vào
        $redirect_url = $this->url;
        if (strpos($redirect_url, '?') === false)
        {
            $redirect_url .= '?';
        }
        else if (substr($redirect_url, strlen($redirect_url)-1, 1) != '?' && strpos($redirect_url, '&') === false)
        {
            // Nếu biến $redirect_url có '?' nhưng không kết thúc bằng '?' và có chứa dấu '&' thì bổ sung vào cuối
            $redirect_url .= '&';
        }

        // Tạo đoạn url chứa tham số
        $url_params = '';
        foreach ($params as $key=>$value)
        {
            if ($url_params == '')
                $url_params .= $key . '=' . urlencode($value);
            else
                $url_params .= '&' . $key . '=' . urlencode($value);
        }
        return $redirect_url.$url_params;
    }

    /**
     * Hàm thực hiện xác minh tính chính xác thông tin trả về từ BaoKim.vn
     * @param $_GET chứa tham số trả về trên url
     * @return true nếu thông tin là chính xác, false nếu thông tin không chính xác
     */
    public function verifyResponseUrl($data)
    {
        $checksum = $data['checksum'];
        unset($data['checksum']);

        ksort($data);
        $str_combined = $this->secure_pass.implode('', $data);

        // Mã hóa các tham số
        $verify_checksum = strtoupper(md5($str_combined));

        // Xác thực mã của chủ web với mã trả về từ baokim.vn
        if ($verify_checksum === $checksum)
            return true;

        return false;
    }
}