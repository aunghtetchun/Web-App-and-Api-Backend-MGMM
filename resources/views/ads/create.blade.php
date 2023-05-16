@extends('dashboard.app')

@section("title") Add Ads @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Ads" => route("post.index"),
    ]])
        @slot("last") Add Ads @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-xl-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Ads @endslot
                @slot('button')
                    <a href="{{ route('post.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('ads.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="link">Ads Link</label>
                                    <input required type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" value="{{old('link')}}" placeholder="Ads Name">
                                    @error('link')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="type">Ads Type</label>
                                    <select class="form-select select2 type_select form-control" name="type" id="type"  aria-label="Default select">
                                        <option selected disabled>Choose Ads Type</option>
                                        <option value="1">Top</option>
                                        <option value="2">Middle</option>
                                        <option value="3">Bottom</option>
                                    </select>
                                    @error('type')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="form-group justify-content-center align-items-center">
                                    <label for="photo">Ads Image</label>
                                    <input  required type="file" accept="image/png, .jpeg, .jpg, image/gif" class="form-control d-none  p-1 @error('photo') is-invalid @enderror" name="photo" id="photo" value="{{old('photo')}}" placeholder="Ads Logo" onchange="readURL(this);">
                                    @error('photo')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                    <img id="blah" onclick="$('#photo').trigger('click');" class="w-100 rounded" src="{{asset('dashboard/images/upload.png')}}" alt="your image" />
                                </div>

                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Ads</button>
                        </form>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')

@endsection
