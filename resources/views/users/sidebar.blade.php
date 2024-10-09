<div class="section-menu-left">
    <div class="box-logo">
        <a href="{{ route('home') }}" id="site-logo-inner">
            <img id="logo_header" alt="Site Logo"
                 src="{{ asset('images/logo/logo.png') }}"
                 data-light="{{ asset('images/logo/logo.png') }}"
                 data-dark="{{ asset('images/logo/logo.png') }}">
        </a>
        <div class="button-show-hide">
            <i class="icon-menu-left"></i>
        </div>
    </div>

    <div class="center">
        <div class="center-item">
            <div class="center-heading">Main Home</div>
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="{{ route('home') }}">
                        <div class="icon"><i class="icon-grid"></i></div>
                        <div class="text">Dashboard</div>
                    </a>
                </li>
            </ul>
        </div>

        @if(Auth::user()->utype === 'USR')
            <div class="center-item">
                <ul class="menu-list">
                    <li class="menu-item has-children">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-shopping-cart"></i></div>
                            <div class="text">Products</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <div class="icon"><i class="icon-settings"></i></div>
                            <div class="text">Settings</div>
                        </a>
                    </li>

                </ul>
            </div>
        @endif
    </div>
</div>
