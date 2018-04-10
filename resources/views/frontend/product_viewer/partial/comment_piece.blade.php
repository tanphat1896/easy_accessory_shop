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
        <div class="actions">
            <a class="reply">Reply</a>
        </div>
    </div>
</div>