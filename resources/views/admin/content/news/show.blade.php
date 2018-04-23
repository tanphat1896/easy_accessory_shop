@extends('admin.layouts.master')

@section('title', 'Xem bài viết')

@section('content')
    <div class="ui blue segment">
        <h3 class="ui header dividing">
            <a href="{{ route('news.index') }}"><i class="double angle left circular fitted small icon"></i></a>
            {{ $news->tieu_de }}
            <a href="{{ route('news.edit', [$news->id]) }}" class="ui small label blue">
                <i class="edit icon"></i>Sửa
            </a>
            <span class="sub header small-td-margin">
                <i class="user fitted icon"></i> {{ $news->admin->name }}
                <span class="short-space"></span>
                <i class="calendar outline fitted icon"></i> {{ \App\Helper\StringHelper::longDate($news->created_at) }}
            </span>
        </h3>
        {!! $news->noi_dung !!}
    </div>
@endsection