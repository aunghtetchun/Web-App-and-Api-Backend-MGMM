@extends('dashboard.app')

@section("title") Edit Ads @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Ads" => route("post.index"),
    ]])
        @slot("last") Edit Ads @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-xl-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Edit Ads @endslot
                @slot('button')
                    <a href="{{ route('post.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('ads.update',$ad->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="link">Ads Link</label>
                                <input required type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" value="{{ $ad->link }}" placeholder="Ads Link">
                                @error('link')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="type">Ads Type</label>

                                <select class="form-select  form-control" name="type" id="type"  aria-label="Default select">
                                    <option disabled>Choose Ads Type</option>
                                    <option value="1" {{ $ad->type == 1 ? "selected":"" }}>Top</option>
                                    <option value="2" {{ $ad->type == 2 ? "selected":"" }}>Middle</option>
                                    <option value="3" {{ $ad->type == 3 ? "selected":"" }}>Bottom</option>
                                </select>
                                @error('type')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group justify-content-center align-items-center">
                                <label for="photo" >Ads Image</label>

                                <input type="file" accept="image/png, .jpeg, .jpg, image/gif" class="form-control d-none  p-1 @error('photo') is-invalid @enderror" name="photo" id="photo" value="{{old('photo')}}" placeholder="Ads Logo" onchange="readURL(this);">

                                @error('photo')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror

                                <img id="blah" onclick="$('#photo').trigger('click');" class="w-100 rounded" src="{{asset("/storage/ads/".$ad->photo)}}" alt="your image" />
                                <a onclick="$('#photo').trigger('click');" class="btn text-white btn-primary btn-sm" style="margin-top: -84px; margin-left: 6px">
                                    <i class="fas fa-edit "></i>
                                </a>
                            </div>

                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Update Ads</button>
                        </form>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')

@endsection
