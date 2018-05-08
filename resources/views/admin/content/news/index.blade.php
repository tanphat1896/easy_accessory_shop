@extends('admin.layouts.master')

@section('title', 'Tin tức')

@section('content')
    <div class="ui blue segment">
        <h3 class="ui header dividing center aligned">Quản lý tin tức</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('news.destroy', [0]) }}" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>
            <a href="{{ route('news.create') }}" class="ui small blue button">
                <i class="plus icon"></i>Thêm mới
            </a>

            <div class="ui divider small-td-margin hidden"></div>

            <table class="ui table celled compact center aligned">
                <thead>
                <tr>
                    <th class="collapsing">
                        <div class="ui checkbox" id="select-all-news">
                            <input type="checkbox">
                        </div>
                    </th>
                    <th class="collapsing">STT</th>
                    <th>Tiêu đề</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news_s as $idx => $news)
                    <tr>
                        <td>
                            <div class="ui child checkbox">
                                <input type="checkbox" name="news-id[]" value="{{ $news->id }}">
                            </div>
                        </td>
                        <td>{{ $idx + 1 }}</td>
                        <td class="left aligned">{{ $news->tieu_de }}</td>
                        <td class="collapsing">{{ \App\Helper\StringHelper::longDate($news->created_at) }}</td>
                        <td>
                            <a href="{{ route('news.show', [$news->id]) }}" class="ui small blue label">
                                <i class="eye open fitted icon"></i>
                            </a>
                            <a href="{{ route('news.edit', [$news->id]) }}" class="ui small green label">
                                <i class="edit open fitted icon"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()">
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>
            <a href="{{ route('news.create') }}" class="ui small blue button">
                <i class="plus icon"></i>Thêm mới
            </a>
        </form>

    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('select-all-news');
    </script>
@endpush