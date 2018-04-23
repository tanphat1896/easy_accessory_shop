<div class="comment">
    <a class="avatar">
        <img src="{{ asset('assets/images/uploaded/avt/steve.jpg') }}">
    </a>
    <div class="content">
        <a class="author">{{ $author }}</a>
        <div class="metadata">
            <span class="date">{{ $time }}</span>
        </div>
        <div class="text">
            {{ $content }}
        </div>
    </div>

    @if ($children->count() > 0)
        <div class="comments">
            @foreach($children as $child)
                <div class="comment">
                    <a class="avatar"><img src="{{ asset('assets/images/uploaded/avt/dolphin.png') }}"></a>
                    <div class="content">
                        <a class="author">{{ $child->name }}</a>

                        <div class="metadata">
                            <div class="date">{{ \App\Helper\StringHelper::shortDate($child->created_at) }}</div>
                        </div>

                        <div class="text">{{ $child->noi_dung }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>