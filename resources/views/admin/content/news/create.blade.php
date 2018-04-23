@extends('admin.layouts.master')

@section('title', 'Tin mới')

@section('content')
    <div class="ui blue segment">
        <h3 class="ui header dividing">
            <a href="{{ route('news.index') }}"><i class="double angle left circular fitted small icon"></i></a>
            Viết bài mới</h3>

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('news.store') }}" method="post" class="ui form">
            {{ csrf_field() }}

            <div class="ui stackable grid">
                <div class="eleven wide column">
                    <div class="field">
                        <label>Tiêu đề</label>
                        <input type="text" required name="title" placeholder="Tiêu đề">
                    </div>

                    @include('sharing.lfm_field', ['label' => 'Ảnh hiển thị', 'thumb' => '', 'needThumb' => 0])
                </div>

                <div class="five wide column">
                    <div class="field">
                        <label>Preview</label>
                        <img id="holder" style="margin-top:5px;max-height:100px;" class="ui border image">
                    </div>
                </div>
            </div>

            <div class="field">
                <label>Nội dung</label>
                @include('sharing.ckeditor')
            </div>

            <div class="field">
                <button class="ui blue button"><i class="save icon"></i>Lưu bài</button>
            </div>
        </form>
    </div>
@endsection