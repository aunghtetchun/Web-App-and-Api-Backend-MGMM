@extends('dashboard.app')

@section("title") Add Popular @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Popular" => route("post.index"),
    ]])
        @slot("last") Add Popular @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-xl-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Popular @endslot
                @slot('button')
                    <a href="{{ route('popular.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('popular.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row justify-content-between ">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <textarea rows="9" required class="form-control @error('title') is-invalid @enderror" name="title"  id="title">{{old('title')}}</textarea>
                                        @error('title')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Link Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="Link One">
                                        @error('name')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="link1">Link</label>
                                        <input type="text" class="form-control @error('link1') is-invalid @enderror" name="link1" id="link1" value="{{old('link1')}}" placeholder="Link One">
                                        @error('link1')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group justify-content-center align-items-center">
                                        <label for="logo"> Logo</label>
                                        <input  required type="file" accept="image/png, .jpeg, .jpg,image/webp, image/gif" class="form-control d-none  p-1 @error('logo') is-invalid @enderror" name="logo" id="logo" value="{{old('logo')}}" placeholder="Ads Logo" onchange="readURL(this);">
                                        @error('logo')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <img id="blah" onclick="$('#logo').trigger('click');" class="w-100 rounded" src="{{asset('dashboard/images/upload.png')}}" alt="your image" />
                                    </div>
                                    <div class="form-group input-field">
                                        <label class="active" for="images"> Photos</label>
                                        <div class="input-images-1" style="padding-top: .5rem;"></div>
                                        {{--                                        <input required type="file" accept="image/png, .jpeg, .jpg, image/gif" multiple class="input-images-1 p-1 form-control @error('images') is-invalid @enderror" name="images[]" id="images" value="{{old('images')}}" style="padding-top: .5rem;">--}}
                                        @error('images')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea rows="9" required class="form-control @error('description') is-invalid @enderror" name="description"  id="description">{{old('description')}}</textarea>
                                        @error('description')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Popular</button>
                        </form>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')
    <script>
        $('.input-images-1').imageUploader();
        // $('#description').summernote({
        //     height: 200,                 // set editor height
        //     minHeight: null,             // set minimum height of editor
        //     maxHeight: null,             // set maximum height of editor
        //     focus: true
        // });
    </script>
@endsection
