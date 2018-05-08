<form action="{{ route('cart.add', [$product->slug]) }}"
      class="ui form" method="post">
    {{ csrf_field() }}

    <div class="field limit-size">
        <label for="">Số lượng (Còn <span class="red-text">{{ $product->so_luong }}</span> sản phẩm)</label>
        <input type="number" value="1" min="1"
               max="{{ $product->so_luong <= 5 ? $product->so_luong : 5  }}" name="amount" id="amount"
               onchange="updateTotalPrice()">
    </div>

    <div class="field">
        <label for="">Tổng số tiền</label>
        <span class="ui green header" id="total-cost">{{ number_format($priceSale) }} đ</span>
    </div>

    <div class="field">
        <button class="ui blue button">
            <i class="cart icon"></i> Thêm vào giỏ
        </button>
    </div>
</form>