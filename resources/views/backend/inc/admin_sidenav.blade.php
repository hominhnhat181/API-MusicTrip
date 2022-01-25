<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('admin.dashboard') }}" class="d-block text-center">
                <img class="mw-100" src="{{static_asset('assets/backend/img/logo.jpg')}}" class="brand-icon object-fit-contain" alt="Rehau">
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item">
                    <a href="{{route('admin.dashboard')}}" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Dashboard')}}</span>
                    </a>
                </li>
                <!-- Customers -->
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user-friends aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Users') }}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('admin.user.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['admin.users.*'])}}">
                                <span class="aiz-side-nav-text">{{ translate('User list') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Setup & Configurations -->
                {{-- <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-dharmachakra aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Setup & Config')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{route('admin.settings.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['admin.settings.index','admin.settings.edit'])}} ">
                                <span class="aiz-side-nav-text">{{translate('General Settings')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('admin.role.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Role Management')}}</span>
                            </a>
                        </li>
                        
                    </ul>
                </li> --}}
            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
