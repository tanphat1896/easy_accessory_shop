<div class="ui bottom attached tab segment" data-tab="third">
    <div class="ui comments">
        @foreach($sanPham->backendComments as $comment)
            <div class="comment">

                <a class="avatar"><img src="{{ asset('assets/images/uploaded/avt/bee.png') }}"></a>

                <div class="content">
                    <a class="author">{{ $comment->name }}</a>

                    <div class="metadata">
                        <div class="date">{{ \App\Helper\StringHelper::shortDate($comment->created_at) }}</div>
                        <div class="action">
                            <form action="{{ route('binh_luan.update', [$comment->id]) }}" class="force-inline" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="approve" value="{{ ($comment->approved + 1) % 2 }}">
                                @if ($comment->approved)
                                    <button class="ui basic mini orange label pointer">Bỏ duyệt</button>
                                @else
                                    <button class="ui basic mini green color-white label pointer">Duyệt</button>
                                @endif
                            </form>

                            <form action="{{ route('binh_luan.destroy', [$comment->id]) }}" class="force-inline" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="ui basic mini red label pointer">Xóa</button>
                            </form>
                        </div>
                    </div>

                    <div class="text">{{ $comment->noi_dung }}</div>

                    @foreach($comment->children as $child)
                        <div class="comment">
                            <a class="avatar"><img src="{{ asset('assets/images/uploaded/avt/dolphin.png') }}"></a>
                            <div class="content">
                                <a class="author">{{ $child->name }}</a>

                                <div class="metadata">
                                    <div class="date">{{ \App\Helper\StringHelper::shortDate($child->created_at) }}</div>
                                    <div class="action">
                                        <form action="{{ route('binh_luan.destroy', [$child->id]) }}" class="force-inline" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="ui basic mini red label pointer">Xóa</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="text">{{ $child->noi_dung }}</div>
                            </div>
                        </div>
                    @endforeach

                    <form class="ui reply tiny form" method="post" action="{{ route('binh_luan.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="parent" value="{{ $comment->id }}">
                        <input type="hidden" name="product-id" value="{{ $sanPham->id }}">
                        <div class="ui right labeled input">
                            <input type="text" name="content">
                            <button class="ui label pointer">Trả lời</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ui divider small-td-margin"></div>
        @endforeach
    </div>
</div>

@include('admin.san_pham.show.modals')