@extends('dashboard.app')

@section("title") Edit Profile @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[]])
        @slot("last") Edit Profile @endslot
    @endcomponent

    <div class="row">
        <!-- <div class="col-12 col-md-4">
            @component("component.card")
                @slot('icon') <i class="mr-1 feather-lock text-primary"></i> @endslot
                @slot('title') Change Photo @endslot
                @slot('button')  @endslot
                @slot('body')

                        <img src="{{ isset(Auth::user()->photo) ? asset('storage/profile/'.Auth::user()->photo) : asset('dashboard/images/profile_default.png') }}" class="d-block w-50 mx-auto rounded-circle my-3" alt="">

                    <form action="{{ route('profile.changePhoto') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="d-flex justify-content-between align-items-end">
                            <div class="form-group mb-0">
                                <label for="email">
                                    <i class="mr-1 feather-image"></i>
                                    Select New Photo
                                </label>
                                <input type="file" name="photo" class="form-control p-1 mr-2 overflow-hidden" required>

                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-upload"></i>
                            </button>
                        </div>
                        @error("photo")
                        <small class="font-weight-bold text-danger text-center">{{ $message }}</small>
                        @enderror
                    </form>
                @endslot
            @endcomponent

                @component("component.card")
                    @slot('icon') <i class="mr-1 feather-lock text-primary"></i> @endslot
                    @slot('title') Change Background @endslot
                    @slot('button')  @endslot
                    @slot('body')

                        <img src="{{ asset("/dashboard/css/main_bg.svg") }}" class="d-block w-100 mx-auto" alt="">

                        <form action="{{ route('photo.changeBackground') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="d-flex justify-content-between align-items-end">
                                <div class="form-group mb-0">
                                    <label for="background">
                                        <i class="mr-1 feather-image"></i>
                                        Select New Background
                                    </label>
                                    <input type="file" name="background" class="form-control p-1 mr-2 overflow-hidden" required>

                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="mr-1 feather-upload"></i>
                                </button>
                            </div>
                            @error("background")
                            <small class="font-weight-bold text-danger text-center">{{ $message }}</small>
                            @enderror
                        </form>
                    @endslot
                @endcomponent

        </div> -->

        <div class="col-12 col-md-4">
            @component("component.card")
                @slot('icon') <i class="mr-1 feather-user text-primary"></i> @endslot
                @slot('title') Change Name @endslot
                @slot('button')  @endslot
                @slot('body')
                    <form action="{{ route('profile.changeName') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">
                                <i class="mr-1 feather-user"></i>
                                Your Name
                            </label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                            @error("name")
                            <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" required>
                                <label class="custom-control-label" for="customSwitch1">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Name
                            </button>
                        </div>
                    </form>
                @endslot
            @endcomponent
            @component("component.card")
                    @slot('icon') <i class="mr-1 feather-mail text-primary"></i> @endslot
                    @slot('title') Change Email @endslot
                    @slot('button')  @endslot
                    @slot('body')
                        <form action="{{ route('profile.changeEmail') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">
                                    <i class="mr-1 feather-mail"></i>
                                    Your Email
                                </label>
                                <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                                @error("email")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3" required>
                                    <label class="custom-control-label" for="customSwitch3">I'm Sure</label>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="mr-1 feather-refresh-ccw"></i>
                                    Change Email
                                </button>
                            </div>
                        </form>
                    @endslot
                @endcomponent
                <!-- @component("component.card")
                    @slot('icon') <i class="mr-1 feather-mail text-primary"></i> @endslot
                    @slot('title') Change Version @endslot
                    @slot('button')  @endslot
                    @slot('body')
                        <form action="{{ route('gVersion.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="version">
                                    <i class="mr-1 feather-star"></i>
                                    App Version
                                </label>
                                @if(\App\GVersion::count() > 0)
                                    <input type="text" name="version" class="form-control" value="{{ \App\GVersion::latest()->first()->version }}">
                                @else
                                    <input type="text" name="version" class="form-control" value="{{ old('version') }}">
                                @endif
                                @error("version")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">
                                    <i class="mr-1 feather-link"></i>
                                    App Link
                                </label>
                                @if(\App\GVersion::count() > 0)
                                    <input type="text" name="link" class="form-control" value="{{ \App\GVersion::latest()->first()->link }}">
                                @else
                                    <input type="text" name="link" class="form-control" value="{{ old('link') }}">
                                @endif
                                @error("link")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">
                                    <i class="mr-1 feather-link"></i>
                                    Ads Code
                                </label>
                                @if(\App\GVersion::count() > 0)
                                    <input type="text" name="code" class="form-control" value="{{ \App\GVersion::latest()->first()->code }}">
                                @else
                                    <input type="text" name="code" class="form-control" value="{{ old('code') }}">
                                @endif
                                @error("code")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">
                                    <i class="mr-1 feather-link"></i>
                                    Video Ads
                                </label>
                                @if(\App\GVersion::count() > 0)
                                    <input type="text" name="video_one" class="form-control" value="{{ \App\GVersion::latest()->first()->video_one }}">
                                @else
                                    <input type="text" name="video_one" class="form-control" value="{{ old('video_one') }}">
                                @endif
                                @error("video_one")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">
                                    <i class="mr-1 feather-link"></i>
                                    Video Ads
                                </label>
                                @if(\App\GVersion::count() > 0)
                                    <input type="text" name="video_two" class="form-control" value="{{ \App\GVersion::latest()->first()->video_two }}">
                                @else
                                    <input type="text" name="video_two" class="form-control" value="{{ old('video_two') }}">
                                @endif
                                @error("video_two")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">
                                    <i class="mr-1 feather-link"></i>
                                    Banner Ads
                                </label>
                                @if(\App\GVersion::count() > 0)
                                    <input type="text" name="banner_one" class="form-control" value="{{ \App\GVersion::latest()->first()->banner_one }}">
                                @else
                                    <input type="text" name="banner_one" class="form-control" value="{{ old('banner_one') }}">
                                @endif
                                @error("banner_one")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">
                                    <i class="mr-1 feather-link"></i>
                                    Banner Ads
                                </label>
                                @if(\App\GVersion::count() > 0)
                                    <input type="text" name="banner_two" class="form-control" value="{{ \App\GVersion::latest()->first()->banner_two }}">
                                @else
                                    <input type="text" name="banner_two" class="form-control" value="{{ old('banner_two') }}">
                                @endif
                                @error("banner_two")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">
                                    <i class="mr-1 feather-lock"></i>
                                    Password
                                </label>
                                    <input type="text" name="password" class="form-control">
                                @error("password")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch4" required>
                                    <label class="custom-control-label" for="customSwitch4">I'm Sure</label>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="mr-1 feather-refresh-ccw"></i>
                                    Change Version
                                </button>
                            </div>
                        </form>
                    @endslot
                @endcomponent -->

        </div>

        <!-- <div class="col-12 col-md-4">
            @component("component.card")
                @slot('icon') <i class="mr-1 feather-lock text-primary"></i> @endslot
                @slot('title') Change Password @endslot
                @slot('button')  @endslot
                @slot('body')
                    <form action="{{ route('profile.changePassword') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">
                                <i class="mr-1 feather-lock"></i>
                                Current Password
                            </label>
                            <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                            @error("current_password")
                            <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="current">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Password
                            </label>
                            <input type="password" name="new_password" class="form-control" id="current" placeholder="New Password">
                            @error("new_password")
                            <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">
                                <i class="mr-1 feather-check"></i>
                                Confirm Password
                            </label>
                            <input type="password" name="new_confirm_password" class="form-control" id="repeat" placeholder="Confirm Password">
                            @error("new_confirm_password")
                            <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2" required>
                                <label class="custom-control-label" for="customSwitch2">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Now
                            </button>
                        </div>
                    </form>
                @endslot
            @endcomponent
        </div> -->

    </div>
@endsection
