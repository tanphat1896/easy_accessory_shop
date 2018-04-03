<table class="ui table striped celled">
    <thead>
    <tr class="center aligned">
        <th class="collapsing">STT</th>
        <th>Tên</th>
        <th>Loại sản phẩm</th>
        <th>Liên kết</th>
        <th>Icon</th>
        <th class="collapsing">Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $idx => $item)
    <tr>
        <td>{{ $idx + 1 }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->productTypeName() }}</td>
        <td><a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a></td>
        <td><i class="{{ $item->icon }} icon"></i></td>
        <td>
            <form action="{{ route('menu.destroy', [$item->id]) }}" method="post"
                  class="no-margin no-padding force-inline">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="ui tiny red label">Xóa</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>