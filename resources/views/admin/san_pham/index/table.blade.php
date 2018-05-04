<table class="ui celled striped table" id="bang-sp">
    <thead>
    <tr class="center aligned">
        <th class="collapsing">STT</th>
        <th>Tên SP</th>
        <th class="collapsing">Số lượng</th>
        <th>Tình trạng</th>
        <th>Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sanPhams as $stt => $sanPham)
        <tr>
            <td>{{ $stt + 1 }}</td>
            <td>{{ $sanPham->ten_san_pham }}</td>
            <td>{{ $sanPham->so_luong }}</td>
            <td class="collapsing" id="{{ 'status' . $sanPham->id }}">
                {{ \App\Helper\StringHelper::getProductStatus($sanPham->tinh_trang) }}
            </td>
            <td class="collapsing">
                <a href="{{ route('san_pham.show', [$sanPham->id]) }}"
                   class="ui small blue label">
                    <i class="eye open fitted icon"></i>
                </a>
                <a href="{{ route('san_pham.edit', [$sanPham->id]) }}"
                   class="ui small green label">
                    <i class="edit fitted icon"></i>
                </a>

                    <a  onclick="stopSale({{ $sanPham->id }})" id="{{ 'stop-' . $sanPham->id }}" 
                        class="ui small orange label" style="display: {{ $sanPham->tinh_trang ? '': 'none' }}" >
                        <i class="pause fitted icon"></i>
                    </a>

                    <a  onclick="resumeSale({{ $sanPham->id }})" id="{{ 'resume-' . $sanPham->id }}" 
                        class="ui small teal label" style="display: {{ $sanPham->tinh_trang ? 'none': '' }}"  >
                        <i class="play fitted icon"></i>
                    </a>
            </td>
        </tr>
    @endforeach
    </tbody>
    @if (method_exists($sanPhams, 'render'))
        <tfoot>
        <tr class="center aligned"><th colspan="5">
                {{ $sanPhams->render('vendor.pagination.smui')}}
            </th></tr>
        </tfoot>
    @endif
</table>

@push('script')
    <script type="text/javascript">
        let token = $('meta[name="csrf-token"]').attr('content');
        function stopSale(id) {
            axios.post('/admin/san_pham/' + id, {
                _token: token, _method: 'DELETE'
            }).then(res => {
                $.toast({text: 'Sản phẩm đã ngừng kinh doanh', icon: 'success', 
                    loader: false, position: 'bottom-right'});
                $(`#stop-${id}`).hide();
                $(`#resume-${id}`).show();
                $('#status' + id).text("Ngừng k.doanh");
            }).catch(err => $.toast({text: 'Lỗi! Hãy thử lại sau', icon: 'error', 
                    loader: false, position: 'bottom-right'}));
        }

        function resumeSale(id) {
            axios.post('/admin/san_pham/' + id + '/resume', {_token: token}
                ).then(res => {
                $.toast({text: 'Sản phẩm đã kinh doanh lại', icon: 'success', 
                    loader: false, position: 'bottom-right'});
                $(`#stop-${id}`).show();
                $(`#resume-${id}`).hide();
                $('#status' + id).text("Kinh doanh");
            }).catch(err => $.toast({text: 'Lỗi! Hãy thử lại sau', icon: 'error', 
                    loader: false, position: 'bottom-right'}));
        }
    </script>
@endpush