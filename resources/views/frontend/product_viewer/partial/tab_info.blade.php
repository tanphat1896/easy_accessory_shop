<div class="ui bottom attached active tab segment" data-tab="first">
    @if ($product->thongSos->count())
        <h3 class="ui header center aligned">Thông số kỹ thuật</h3>
        <table class="ui equal width blue striped celled table">
            <thead><tr>
                <th class="six wide right aligned">Thông số</th>
                <th class="six wide">Giá trị</th>
            </tr></thead>
            @foreach($product->thongSos as $thongSo)
                <tr>
                    <td class="right aligned">{{ $thongSo->getName() }}</td>
                    <td>{{ $thongSo->pivot->gia_tri }}</td>
                </tr>
            @endforeach
        </table>
    @endif

    <div class="ui divider"></div>

    {!! $product->mo_ta !!}
</div>

@push('script')
    <script>
    </script>
@endpush