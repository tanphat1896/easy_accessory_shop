<div href="" class="ui dropdown icon item">
    <i class="comments icon"></i>
    @php $totalComment = \App\Helper\Statistic::totalCommentNotApproved(); @endphp
    @if (!empty($totalComment))
        <span class="ui small floating red circular label">{{ $totalComment }}</span>
    @endif
    <div class="menu">
        @foreach(\App\Helper\Comment::getUnapprovedComments() as $comment)
            <a href="{{ route('san_pham.show', [$comment->san_pham_id]) }}" class="item">
                <span class="ui mini red label">Mới</span>{{ $comment->name }} vừa bình luận
            </a>
        @endforeach
    </div>
</div>