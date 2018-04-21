<div class="ui bottom attached tab segment" data-tab="second">
    <div class="ui threaded comments" id="comments">

        @foreach($comments as $comment)
            @include('frontend.product_viewer.partial.comment_piece', [
                'author' => $comment->name,
                'time' => \App\Helper\StringHelper::shortDate($comment->created_at),
                'content' => $comment->noi_dung,
                'children' => $comment->children
            ])
        @endforeach

        @if (Auth::guard('customer')->check())
            <form class="ui reply form" id="form-reply">
                <input type="hidden" id="email" value="{{ Auth::guard('customer')->user()->email }}">
                <input type="hidden" id="slug" value="{{ $product->slug }}">
                <div class="field">
                    <textarea id="content" style="height: 50px;"></textarea>
                </div>
                <button class="ui blue icon button">
                    <i class="icon send"></i> Thêm bình luận
                </button>
            </form>
        @else
            <br>
            <i>Vui lòng <a class="pointer" onclick="$('#modal-auth').modal('show')">đăng nhập</a> để bình luận</i>
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
            let content = $('#content').val(),
                email = $('#email').val(),
                slug = $('#slug').val();

            if (content.trim() === '')
                return;

            axios.post('/comments', {email, content, slug, '_token': '{{ csrf_token() }}'})
                .then(rs => {
                    if (rs.data.toString() === 'false')
                        return $.toast({
                            heading: 'Lỗi!', text: 'Không thêm được bình luận, thử lại sau',
                            loader: false, icon: 'error', position: 'bottom-right'
                        });

                    $('#content').val('');
                    return $.toast({
                        heading: 'Thành công!', text: 'Bình luận đang chờ duyệt',
                        loader: false, icon: 'success', position: 'bottom-right'
                    });
                })
                .catch(err => console.log(err));
        }
    </script>
@endpush