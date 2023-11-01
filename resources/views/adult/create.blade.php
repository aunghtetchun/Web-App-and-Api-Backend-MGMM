@extends('dashboard.app')

@section("title") Add Adult @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Adult" => route("adult.index"),
    ]])
        @slot("last") Add Adult @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-xl-10">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Adult @endslot
                @slot('button')
                    <a href="{{ route('adult.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('adult.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row justify-content-between ">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="name">Adult Name</label>
                                        <input required type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="Adult Name">
                                        @error('name')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Online ? Offline</label>
                                        <input required type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type" value="Offline" placeholder="Adult Type">
                                        @error('type')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" id="category_id" class="form-control select2">
                                            <option value="10">18 +</option>
                                        </select>
                                        @error('category_id')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="updated">Updated</label>
                                        <input required type="text" class="form-control @error('updated') is-invalid @enderror" name="updated" id="updated" value="{{ date('Y-m-d') }}" placeholder="Updated">
                                        @error('updated')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="size">Size</label>
                                        <input required type="text" class="form-control @error('size') is-invalid @enderror" name="size" id="size" value="{{old('size')}}" placeholder="Size">
                                        @error('size')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="version">Version</label>
                                        <input required type="text" class="form-control @error('version') is-invalid @enderror" name="version" id="version" value="{{old('version')}}" placeholder="Version">
                                        @error('version')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="requirement">Requirement</label>
                                        <input required type="text" class="form-control @error('requirement') is-invalid @enderror" name="requirement" id="requirement" value="Android 6.0" placeholder="Requirement">
                                        @error('requirement')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="developer">Developer Company</label>
                                        <input required type="text" class="form-control @error('developer') is-invalid @enderror" name="developer" id="developer" value="Unknown" placeholder="Developer Company">
                                        @error('developer')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <!--<div class="form-group">-->
                                    <!--    <label for="video">Adultplay Video</label>-->
                                        <input required type="hidden" class="form-control @error('video') is-invalid @enderror" name="video" id="video" value="aaa" placeholder="Adultplay Video">
                                        <!--@error('video')-->
                                    <!--    <small class="invalid-feedback font-weight-bold" role="alert">-->
                                    <!--        {{ $message }}-->
                                    <!--    </small>-->
                                    <!--    @enderror-->
                                    <!--</div>-->
                                    <div class="form-group">
                                        <!--<label for="link1">Link One</label>-->
                                           <input type="text" class="form-control @error('name_1') is-invalid @enderror" name="name_1" id="name_1" value="Download Mod Apk" placeholder="Download Mod Apk">
                                        
                                        <input type="text" class="form-control mt-1 @error('link1') is-invalid @enderror" name="link1" id="link1" value="{{old('link1')}}" placeholder="မရှိရင်မထည့်လည်းရပါတယ်">
                                        @error('link1')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                 
                                    <div class="form-group">
                                        <!--<label for="link2">Obb File</label>-->
                                        <input type="text" class="form-control @error('name_2') is-invalid @enderror" name="name_2" id="name_2" value="Download Apk (Google Drive)" placeholder="Download Obb">
                                        
                                        <input type="text" class="form-control mt-1 @error('link2') is-invalid @enderror" name="link2" id="link2" value="{{old('link2')}}" placeholder="မရှိရင်မထည့်လည်းရပါတယ်">
                                        @error('link2') 
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <!--<label for="link3">Apk File</label>-->
                                         <input type="text" class="form-control @error('name_3') is-invalid @enderror" name="name_3" id="name_3" value="Download Apk (Mega)" placeholder="Download Original Apk">
                                        
                                        <input type="text" class="form-control mt-1 @error('link3') is-invalid @enderror" name="link3" id="link3" value="{{old('link3')}}" placeholder="မရှိရင်မထည့်လည်းရပါတယ်">
                                        @error('link3')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group justify-content-center align-items-center">
                                        <label for="logo">Adult Logo</label>
                                        <input  required type="file" accept="image/png, .jpeg, .jpg,image/webp, image/gif" class="form-control d-none  p-1 @error('logo') is-invalid @enderror" name="logo" id="logo" value="{{old('logo')}}" placeholder="Ads Logo" onchange="readURL(this);">
                                        @error('logo')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <img id="blah" onclick="$('#logo').trigger('click');" class="w-100 rounded" src="{{asset('dashboard/images/upload.png')}}" alt="your image" />
                                    </div>
                                    <div class="form-group input-field">
                                        <label class="active" for="images">Adult Photos</label>
                                        <div class="input-images-1" style="padding-top: .5rem;"></div>
{{--                                        <input required type="file" accept="image/png, .jpeg, .jpg, image/gif" multiple class="input-images-1 p-1 form-control @error('images') is-invalid @enderror" name="images[]" id="images" value="{{old('images')}}" style="padding-top: .5rem;">--}}
                                        @error('images')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="features">Mod Features</label>
                                        <textarea rows="9" required class="form-control @error('features') is-invalid @enderror" name="features"  id="features">အိပ်တင်းပလက်ဂိမ်းပါ ခိုးထားတာမဟုတ်ပါဘူး</textarea>
                                        @error('features')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea rows="9" required class="form-control @error('description') is-invalid @enderror" name="description"  id="description">{{old('description')}}</textarea>
                                        @error('description')https://workupload.cohttps://workupload.com/file/GNh36PwCkFQhttps://workupload.com/file/GNh36PwCkFQhttps://workupload.com/file/GNh36PwCkFQm/file/GNh36PwCkFQ
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Adult</button>
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
        $('#description').summernote({
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true
        });
    </script>
@endsection
