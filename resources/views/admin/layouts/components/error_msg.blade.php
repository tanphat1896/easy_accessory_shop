@if(Session::has('errors'))
    <div class="ui small negative message">
        <strong>Xin hãy kiểm tra lại</strong>
        <ul class="list">
            @foreach(Session::get('errors') as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
        <i class="close icon" onclick="$(this).closest('.message').transition('fade')"></i>
    </div>
@endif