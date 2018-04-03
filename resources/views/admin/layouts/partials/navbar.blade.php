<div class="ui fixed borderless menu" style="height: 50px;">
    @if($wideMenu)
        <a class="item header" id="logo" href='/admin'>
            {{-- <img class="ui small image" src="{{ asset('assets/images/logo.png') }}" alt="Logo"> --}}
        </a>

        <a class="icon item" id="btn-toggle-menu">
            <i class="double angle left icon"></i>
        </a>
    @else
        <a class="item header" id="logo" href="/admin" style="width: 50px">
            {{-- <img class="ui small image" src="{{ asset('assets/images/logo.png') }}" alt="Logo"> --}}
        </a>    

        <a class="icon item" id="btn-toggle-menu">
            <i class="double angle right icon"></i>
        </a>
    @endif

    <a href="/" class="icon item need-popup" target="_blank" 
        data-content="Trang khách hàng" 
        data-position="bottom left">
        <i class="home icon"></i></a>

    <div class="right menu">
        <div href="" class="ui dropdown icon item">
            <i class="yellow bell icon"></i>
            <span class="ui floating red circular label">5</span>
            <div class="menu">
                <div class="item">Thông báo fsdfsafd safds fdsaf dsad fsdf dsad sad<br>
                fsafdsa</div>
                <div class="item">Thông báo</div>
                <div class="item">Thông báo</div>
                <div class="item">Thông báo</div>
            </div>
        </div>
        <div href="" class="ui dropdown icon item">
            <i class="blue mail icon"></i>
            <span class="ui floating red circular label">7</span>
            <div class="menu">
                <div class="item">Thông báo fsdfsafd safds fdsaf dsad fsdf dsad sad<br>
                fsafdsa</div>
                <div class="item">Thông báo</div>
                <div class="item">Thông báo</div>
                <div class="item">Thông báo</div>
            </div>
        </div>
        <div href="" class="ui dropdown item">
            <img id="admin-avt" src="{{ asset('assets/images/uploaded/avt/steve.jpg') }}" class="ui mini circular image">
            <strong>Nguyễn Văn A</strong>
            <i class="dropdown icon"></i>
            <div class="menu">
                <a href="" class="item">Đăng xuất</a>
                <a href="" class="item">Thông tin</a>
            </div>
        </div>
    </div>
</div>