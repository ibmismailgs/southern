<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('dashboard')}}">
            <div class="logo-img">
               <img height="30" src="{{ asset('img/logo.png')}}" class="header-brand-img" title="Southern">
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
        $route  = Route::current()->getName();
    @endphp

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard')}}</span></a>
                </div>

                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user' || $route == 'role.create' || $route == 'role-edit') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-user"></i><span>{{ __('Adminstrator')}}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        @can('manage_user')
                            <a href="{{url('users')}}" class="menu-item {{ ($segment1 == 'users' || $route == 'edit-user') ? 'active' : '' }}">{{ __('Users')}}</a>

                            <a href="{{url('user/create')}}" class="menu-item {{ ($segment1 == 'user' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add User')}}</a>
                         @endcan
                         <!-- only those have manage_role permission will get access -->
                        @can('manage_roles')
                            <a href="{{url('roles')}}" class="menu-item {{ ($segment1 == 'roles' || $route == 'role-edit') ? 'active' : '' }}">{{ __('Roles')}}</a>
                        @endcan

                        @can('manage_roles')
                            <a href="{{ route ('role.create') }}" class="menu-item {{ ($route == 'role.create') ? 'active' : '' }}">{{ __('Add Role')}}</a>
                        @endcan
                        <!-- only those have manage_permission permission will get access -->
                        @can('manage_permission')
                            <a href="{{url('permission')}}" class="menu-item {{ ($segment1 == 'permission') ? 'active' : '' }}">{{ __('Permission')}}</a>
                        @endcan
                    </div>
                </div>

                <div class="nav-item {{ ($route == 'settings' || $route == 'menu.index' || $route == 'sub-menu.index') ? 'active open' : '' }} has-sub">
                    <a href="javascript:void(0)" class="menu-item {{ ( $route == 'settings' || $route == 'menu.index' || $route == 'sub-menu.index') ? 'active' : '' }}"><i class="fa fa-cog"></i>{{ __('Settings')}}</a>
                        <div class="submenu-content">

                            @can('manage_user')
                                <a href="{{route('settings')}}" class="menu-item {{ ( $route == 'settings') ? 'active' : '' }}">{{ __('Site Settings')}}</a>
                            @endcan

                            @can('manage_user')
                                <a href="{{route('menu.index')}}" class="menu-item {{ ( $route == 'menu.index') ? 'active' : '' }}">{{ __('Menu List')}}</a>
                            @endcan

                            @can('manage_user')
                                <a href="{{route('sub-menu.index')}}" class="menu-item {{ ( $route == 'sub-menu.index') ? 'active' : '' }}">{{ __('Sub-Menu List')}}</a>
                            @endcan

                        </div>
                </div>

                <div class="nav-item {{ ($route == 'faq.index' || $route == 'faq.create' || $route == 'faq.edit' || $route == 'faq.show') ? 'active open' : '' }} has-sub">

                    <a href="javascript:void(0)" class="faq-item {{ ( $route == 'faq.index' || $route == 'faq.create' || $route == 'faq.edit' || $route == 'faq.show') ? 'active' : '' }}"><i class="fa fa-question"></i>{{ __('Faq')}}</a>
                        <div class="submenu-content">

                            @can('manage_user')
                                <a href="{{ route('faq.index') }}" class="menu-item {{ ($route == 'faq.index' || $route == 'faq.edit' || $route == 'faq.show') ? 'active' : '' }}">{{ __('Faq List')}}</a>
                            @endcan

                            @can('manage_user')
                                <a href="{{ route('faq.create') }}" class="menu-item {{ ( $route == 'faq.create') ? 'active' : '' }}">{{ __('Create Faq')}}</a>
                            @endcan

                        </div>
                </div>

                <div class="nav-item {{ ($route == 'corporate-client.index' || $route == 'corporate-client.create' || $route == 'corporate-client.edit' || $route == 'corporate-client.show') ? 'active open' : '' }} has-sub">

                    <a href="javascript:void(0)" class="corporate-client-item {{ ( $route == 'corporate-client.index' || $route == 'corporate-client.create' || $route == 'corporate-client.edit' || $route == 'corporate-client.show') ? 'active' : '' }}"><i class="fa fa-users"></i>{{ __('Corporate Clients')}}</a>
                        <div class="submenu-content">

                            @can('manage_user')
                                <a href="{{ route('corporate-client.index') }}" class="menu-item {{ ($route == 'corporate-client.index' || $route == 'corporate-client.edit' || $route == 'corporate-client.show') ? 'active' : '' }}">{{ __('Corporate List')}}</a>
                            @endcan

                            @can('manage_user')
                                <a href="{{ route('corporate-client.create') }}" class="menu-item {{ ( $route == 'corporate-client.create') ? 'active' : '' }}">{{ __('Create Corporate')}}</a>
                            @endcan

                        </div>
                </div>

        </div>
    </div>
</div>
