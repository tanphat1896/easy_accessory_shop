@push('style')
    <style type="text/css">
        .feed .label {
            width: 60px !important;
        }
        .feed .label img{
            border-radius: 0 !important;
        }
    </style>
@endpush

<div class="ui basic segment no-padding" id="news">
    <a class="ui blue ribbon label" href="{{ route('news.all') }}">
        <i class="newspaper outline icon"></i>
        Tin tức
    </a>
    <div class="ui feed">
        @foreach($news_s as $news)
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