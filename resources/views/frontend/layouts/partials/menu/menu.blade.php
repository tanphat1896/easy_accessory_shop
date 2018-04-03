<div class="ui square-border no-margin menu">
    @foreach($menuItems as $item)
        <a class="item" href="{{ $item->link }}">
            <i class="{{ $item->icon }} icon"></i> {{ $item->name }}
        </a>
    @endforeach
</div>