@extends('admin.layouts.master')

@section('title', 'Sản phẩm')

@section('content')
    <div class="ui blue raised segment">
        <div class="ui dividing header center aligned no-margin-bottom">Quản lý sản phẩm
            <span class="ui tiny label need-popup right floated"
                  data-html='<span class="ui small blue label small-td-margin"> <i class="eye open fitted icon"></i></span> Xem chi tiết <br>
    <span class="ui small green label"><i class="edit fitted icon"></i></span> Sửa sản phẩm <br>
    <span class="ui small orange label small-td-margin" ><i class="pause fitted icon"></i></span> Ngừng kinh doanh <br>
    <span class="ui small teal label" ><i class="play fitted icon"></i></span> Kinh doanh lại <br>'>
                <i class="question fitted icon"></i></span>
        </div>

        <div class="ui divider hidden no-margin-bottom"></div>

        <div class="ui form">

            <div class="field force-left no-clear">
                <a class="ui blue small button" href="{{ route('san_pham.create') }}">
                    <i class="plus icon fitted"></i>
                    Thêm mới
                </a>

                @include('admin.san_pham.index.filter')
            </div>

            <div class="field force-right no-clear">

                @include('admin.san_pham.index.name_searching')

            </div>
        </div>

        <div class="ui divider hidden clearing no-td-margin"></div>

        @include('admin.san_pham.index.table')
    </div>
@endsection

@push('script')
    <script>
        // bindDataTable('bang-sp');

        $('#sp-filter').popup({
            inline     : true,
            hoverable  : true,
            position   : 'bottom left',
            on: 'click',
            delay: {
                show: 300,
                hide: 5000
            }
        });
    </script>
@endpush