<div class="ui bottom attached active tab segment">
    <div class="ui comments" id="comments">

        @foreach($comments as $comment)
            @include('frontend.product_viewer.partial.comment_piece', [
                'author' => $comment->name, 'time' => \App\Helper\StringHelper::shortDate($comment->created_at), 'content' => $comment->noi_dung
            ])
        @endforeach

        @if (Auth::guard('customer')->check())
            <form class="ui reply form" id="form-reply">
                <input type="hidden" id="email" value="{{ Auth::guard('customer')->user()->email }}">
                <input type="hidden" id="slug" value="{{ $product->slug }}">
                <div class="field">
                    <textarea id="content"></textarea>
                </div>
                <button class="ui blue icon button">
                    <i class="icon send"></i> Thêm bình luận
                </button>
            </form>
        @else
            <br>
            <div class="ui blue label pointer"
                 onclick="$('#modal-auth').modal('show')">
                Đăng nhập để bình luận
            </div>
        @endif
    </div>
</div>

@push('script')
    <script>
        $('#form-reply').submit((e) => {
            e.preventDefault();
            addComment();
        });

        function addComment() {
            let comments = $('#comments'),
                content = $('#content').val(),
                email = $('#email').val(),
                slug = $('#slug').val();

            if (content.trim() === '')
                return;

            axios.post('/comments', {email, content, slug, '_token': '{{ csrf_token() }}'})
                .then(rs => {
                    if (rs.data.toString() === 'false')
                        return $.toast({
                            heading: 'Lỗi!', text: 'Không thêm được bình luận, thử lại sau' ,
                            loader: false, icon: 'error', position: 'bottom-right'});

                    $('#content').val('');
                    return $.toast({
                        heading: 'Thành công!', text: 'Bình luận đang chờ duyệt' ,
                        loader: false, icon: 'success', position: 'bottom-right'
                    });
                })
                .catch(err => console.log(err));
        }
    </script>
@endpush