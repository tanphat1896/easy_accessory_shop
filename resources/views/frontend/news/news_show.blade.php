@extends('frontend.layouts.master')

@section('title', $news->tieu_de)

@section('content')
    <div class="ui container">
        <div class="ui stackable grid">
            <div class="eleven wide column">
                <div class="ui segment">
                    <h3 class="ui dividing header">
                        {{ $news->tieu_de }}
                        <span class="sub header small-td-margin">
                        <i class="user fitted icon"></i> {{ $news->admin->name }}
                            <span class="short-space"></span>
                        <i class="calendar outline fitted icon"></i> {{ \App\Helper\StringHelper::longDate($news->created_at) }}
                    </span>
                    </h3>

                    {!! $news->noi_dung !!}
                </div>
            </div>

            <div class="five wide column">
                <div class="ui segment">
                    <h4 class="ui dividing header"><a href="{{ route('news.all') }}">Bài viết khác</a></h4>
                    <div class="ui feed">
                        @foreach($otherNews_s as $news)
                            <div class="event">
                                <div class="label">
                                    <img src="{{ $news->thumb }}">
                                </div>
                                <div class="content">
                                    <div class="summary">
                                        <a href="{{ route('read.news', [$news->slug]) }}">
                                            {{ $news->tieu_de }}
                                        </a>
                                        <div class="date">
                                            {{ \App\Helper\StringHelper::longDate($news->created_at) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <div class="ui divider hidden"></div>
    </div>
@endsection