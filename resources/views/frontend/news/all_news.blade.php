@extends('frontend.layouts.master')

@section('title', 'Tin tức')

@section('content')
    <div class="ui container normal-td-margin">
        <div class="ui blue segment">
            <h3 class="ui dividing header"><i class="newspaper outline icon"></i>Tin tức</h3>

            <div class="ui items">
                @foreach($news_s as $news)
                    <div class="item">
                        <div class="ui tiny image">
                            <img src="{{ $news->thumb }}"
                                 alt="{{ $news->tieu_de }}">
                        </div>
                        <div class="content">
                            <a href="{{ route('read.news', [$news->slug]) }}"
                               class="header">{{ $news->tieu_de }}</a>
                            <div class="meta">
                                <span class="tiny-text"><i class="calendar outline icon"></i>
                                    {{ \App\Helper\StringHelper::longDate($news->created_at) }}
                                </span>
                            </div>
                            <div class="description">
                                {{ substr(strip_tags($news->noi_dung), 0, 300) }}
                                @if(strlen($news->noi_dung) > 300)
                                    &ctdot;
                                    <a href="{{ route('read.news', [$news->slug]) }}">Đọc tiếp &raquo;</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="ui divider"></div>
                @endforeach
            </div>
        </div>

    </div>
@endsection