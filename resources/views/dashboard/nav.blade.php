@auth
    <div class="aside-left bg-white px-3 pb-2 min-vh-100 shadow">
        <ul class="menu" style="list-style-type: none">
            <li class="brand-icon">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class="brand-icon-img">
                        <small
                            class="text-primary font-weight-bold h5 mb-0 ml-2">{{ \App\Custom::$info['short_name'] }}</small>
                    </div>
                    <button class="btn btn-light d-block d-lg-none aside-menu-close">
                        <i class="feather-x fa-2x"></i>
                    </button>
                </div>
            </li>
            <li>
                <a class="menu-item mt-3" href="{{ route('home') }}">
                    <span>
                        <i class="feather-home"></i>
                        Dashboard
                    </span>
                </a>
            </li>

            @component('component.nav-spacer')
            @endcomponent

            @component('component.nav-title')
                Game Management
            @endcomponent

            @component('component.nav-item')
                @slot('icon')
                    <i class="fas fa-gamepad"></i>
                @endslot
                @slot('name')
                    Add Game
                @endslot
                @slot('link')
                    {{ route('post.create') }}
                @endslot
            @endcomponent

            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-server"></i>
                @endslot
                @slot('name')
                    Game List
                @endslot
                @slot('link')
                    {{ route('post.index') }}
                @endslot
                @slot('count')
                    {{ \App\Post::count() }}
                @endslot
            @endcomponent
            @component('component.nav-spacer')
            @endcomponent

            @component('component.nav-title')
                Software Management
            @endcomponent

            @component('component.nav-item')
                @slot('icon')
                    <i class="fas fa-gamepad"></i>
                @endslot
                @slot('name')
                    Add Software
                @endslot
                @slot('link')
                    {{ route('software.create') }}
                @endslot
            @endcomponent

            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-server"></i>
                @endslot
                @slot('name')
                    Software List
                @endslot
                @slot('link')
                    {{ route('software.index') }}
                @endslot
                @slot('count')
                    {{ \App\Software::count() }}
                @endslot
            @endcomponent
            @component('component.nav-spacer')
            @endcomponent
            @component('component.nav-title')
            Adult Management
        @endcomponent

        @component('component.nav-item')
            @slot('icon')
                <i class="fas fa-gamepad"></i>
            @endslot
            @slot('name')
                Add Adult
            @endslot
            @slot('link')
                {{ route('adult.create') }}
            @endslot
        @endcomponent

        @component('component.nav-item-count')
            @slot('icon')
                <i class="feather-server"></i>
            @endslot
            @slot('name')
                Adult List
            @endslot
            @slot('link')
                {{ route('adult.index') }}
            @endslot
            @slot('count')
                {{ \App\Adult::count() }}
            @endslot
        @endcomponent
        @component('component.nav-spacer')
        @endcomponent
            @component('component.nav-title')
            User Management
        @endcomponent

            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-users"></i>
                @endslot
                @slot('name')
                    Users List
                @endslot
                @slot('link')
                    {{ route('user.userList') }}
                @endslot
                @slot('count')
                    {{ \App\User::count() }}
                @endslot
            @endcomponent
            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-message-square"></i>
                @endslot
                @slot('name')
                    Message List
                @endslot
                @slot('link')
                    {{ route('user.messageList') }}
                @endslot
                @slot('count')
                    {{ \App\Message::count() }}
                @endslot
            @endcomponent
            @component('component.nav-spacer')
            @endcomponent

            @component('component.nav-title')
                Category Management
            @endcomponent

            @component('component.nav-item')
                @slot('icon')
                    <i class="fas fa-clipboard-list"></i>
                @endslot
                @slot('name')
                    Add Category
                @endslot
                @slot('link')
                    {{ route('category.create') }}
                @endslot
            @endcomponent
            <!-- @component('component.nav-item')
        @slot('icon')
            <i class="fas fa-network-wired"></i>
        @endslot
                                @slot('name')
            Add Popular
        @endslot
                                @slot('link')
            {{ route('popular.create') }}
        @endslot
    @endcomponent

                    @component('component.nav-item-count')
        @slot('icon')
            <i class="feather-list"></i>
        @endslot
                                @slot('name')
            Popular List
        @endslot
                                @slot('link')
            {{ route('popular.index') }}
        @endslot
                                @slot('count')
            {{ \App\Popular::count() }}
        @endslot
    @endcomponent

                    @component('component.nav-spacer')
    @endcomponent

                    @component('component.nav-title')
        Ads Management
    @endcomponent

                    @component('component.nav-item')
        @slot('icon')
            <i class="feather-gift"></i>
        @endslot
                                @slot('name')
            Add Ads
        @endslot
                                @slot('link')
            {{ route('ads.create') }}
        @endslot
    @endcomponent

                    @component('component.nav-item-count')
        @slot('icon')
            <i class="feather-list"></i>
        @endslot
                                @slot('name')
            Ads List
        @endslot
                                @slot('link')
            {{ route('ads.index') }}
        @endslot
                                @slot('count')
            {{ \App\Ads::count() }}
        @endslot
    @endcomponent -->

            @component('component.nav-spacer')
            @endcomponent

            @component('component.nav-title')
                Other Management
            @endcomponent
            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-search"></i>
                @endslot
                @slot('name')
                    Search List
                @endslot
                @slot('link')
                    {{ route('viewer.index') }}
                @endslot
                @slot('count')
                    {{ \App\SearchKeyword::count() }}
                @endslot
            @endcomponent

            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-send"></i>
                @endslot
                @slot('name')
                    Request List
                @endslot
                @slot('link')
                    {{ route('request_app.index') }}
                @endslot
                @slot('count')
                    {{ \App\RequestApp::count() }}
                @endslot
            @endcomponent
            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-edit-2"></i>
                @endslot
                @slot('name')
                    Comment List
                @endslot
                @slot('link')
                    {{ route('comment.index') }}
                @endslot
                @slot('count')
                    {{ \App\Comment::withTrashed()->count() }}
                @endslot
            @endcomponent
            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-link"></i>
                @endslot
                @slot('name')
                    Broken Links
                @endslot
                @slot('link')
                    {{ route('suggest.index') }}
                @endslot
                @slot('count')
                    {{ \App\Suggest::count() }}
                @endslot
            @endcomponent
            {{-- @component('component.nav-spacer') @endcomponent --}}

            {{-- @component('component.nav-title') Suggest Management @endcomponent --}}



            @component('component.nav-spacer')
            @endcomponent

            @component('component.nav-title')
                Profile Management
            @endcomponent
            @component('component.nav-item')
                @slot('icon')
                    <i class="feather-user"></i>
                @endslot
                @slot('name')
                    Edit Profile
                @endslot
                @slot('link')
                    {{ route('profile.edit') }}
                @endslot
            @endcomponent




            @component('component.nav-spacer')
            @endcomponent
            <li>
                <a class="menu-item alert-secondary" onclick="logout()" href="#">
                    <span>
                        <i class="fas fa-lock"></i>
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </div>


@endauth
