<?php

namespace App\Http\Controllers\Frontend;

use App\Acme\Behavior\GetOrder;
use App\Acme\Behavior\SearchProduct;
use App\Helper\StringHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    private $orderRules = [
        'prefix' => 'DH_',
        'length' => 16
    ];

    use SearchProduct;
    use GetOrder;

    public function search($keyword = '') {
        $keyword = trim($keyword);
        if (empty($keyword))
            return response()->json(false);

        $keyword = preg_replace('/\s/', '%', $keyword);

        if ($this->isOrderPrefix($keyword))
            return $this->searchOrder($keyword);

        $limitResult = 5;

        $products = $this->searchByName($keyword, $limitResult);

        return response()->json([
            'type' => 'product',
            'products' => $products
        ]);
    }

    private function isOrderPrefix($keyword) {
        return strpos($keyword, $this->orderRules['prefix']) === 0;
    }

    private function searchOrder($keyword) {
        $orders = [];
        if ($this->enoughOrderCodeLength($keyword))
            $orders[] = $this->getOrder($keyword);

        return response()->json([
            'type' => 'order',
            'orders' => $orders
        ]);
    }

    private function enoughOrderCodeLength($orderCode) {
        return strlen($orderCode) === $this->orderRules['length'];
    }
}
