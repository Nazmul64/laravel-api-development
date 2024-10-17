<div class="section-menu-left">
    <div class="box-logo">
        <a href="{{ route('home') }}" id="site-logo-inner">
            <img id="logo_header_1" alt="Site Logo"
                 src="{{ asset('backend/assets/images/logo/logo.png') }}"
                 data-light="{{ asset('backend/assets/images/logo/logo.png') }}"
                 data-dark="{{ asset('backend/assets/images/logo/logo.png') }}">
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

        @if(Auth::user()->utype === 'ADM')
            <div class="center-item">
                <ul class="menu-list">
                    <li class="menu-item has-children">
                        <a href="#" class="menu-item-button">
                            <div class="icon"><i class="icon-shopping-cart"></i></div>
                            <div class="text">Brands</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="{{ route('show.blade') }}">
                                    <div class="text"> Add Brand </div>
                                </a>

                            </li>
                            <li class="sub-menu-item">
                                <a href="#">
                                    <div class="text">Brand List</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            @endif
    </div>
</div>
