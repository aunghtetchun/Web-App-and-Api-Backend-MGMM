@extends('dashboard.app')

@section("title") Add Seller @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Seller" => route("account.index"),
    ]])
        @slot("last") Add Seller @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-8 col-lg-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Seller @endslot
                @slot('button')
                    <a href="{{ route('account.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <!-- <form action="{{ route('seller.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                    <div class="form-group">
                                        <label for="game_id">Seller ID</label>
                                        <input required type="number" class="form-control @error('game_id') is-invalid @enderror" name="game_id" id="game_id" value="{{old('game_id')}}" placeholder="">
                                        @error('game_id')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="server_id">Server ID</label>
                                        <input required type="number" class="form-control @error('server_id') is-invalid @enderror" name="server_id" id="server_id" value="{{old('server_id')}}" placeholder="">
                                        @error('server_id')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Seller Title</label>
                                        <input required type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}" placeholder="">
                                        @error('title')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="security">Security </label>
                                        <input required type="number" class="form-control @error('security') is-invalid @enderror" name="security" id="security" value="{{old('security')}}" placeholder="">
                                        @error('security')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Seller Price</label>
                                        <input required type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{old('price')}}" placeholder="">
                                        @error('price')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group input-field">
                                        <label class="active" for="images">Skin Photos</label>
                                        <div class="input-images-1" style="padding-top: .5rem;"></div>
{{--                                        <input required type="file" accept="image/png, .jpeg, .jpg, image/gif" multiple class="input-images-1 p-1 form-control @error('images') is-invalid @enderror" name="images[]" id="images" value="{{old('images')}}" style="padding-top: .5rem;">--}}
                                        @error('images')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                   
                                    <div class="form-group justify-content-center align-items-center">
                                        <label for="profile">Seller Profile</label>
                                        <input  required type="file" accept="image/png, .jpeg, .jpg,image/webp, image/gif" class="form-control d-none  p-1 @error('profile') is-invalid @enderror" name="profile" id="profile" value="{{old('profile')}}" onchange="readURL(this);">
                                        @error('profile')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <img id="blah" onclick="$('#profile').trigger('click');" class="w-100 rounded" src="{{asset('dashboard/images/upload.png')}}" alt="your image" />
                                    </div>    
                                    <div class="form-group">
                                        <label for="description">Seller Description</label>
                                        <input required type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{old('description')}}" placeholder="">
                                        @error('description')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>        
                                    <div class="form-group">
                                        <label for="skin_id">Select Skins</label>
                                        <select name="skin_id[]" id="skin_id" class="form-control select2img" multiple="multiple">
                                            @foreach(\App\Skin::latest()->get() as $c)
                                                <option data-image="{{ asset("/storage/skin/".$c->url) }}" value="{{ $c->id }}" >{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('skin_id')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>                        

                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Seller</button>
                        </form> -->
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')
    <script>
         $(document).ready(function() {
            $('.select2img').select2({
                templateResult: formatState
            });
        });
        $('.input-images-1').imageUploader();
        function formatState (state) {
            if (!state.id) { return state.text; }
            var baseUrl = state.element.getAttribute('data-image');
            console.log(baseUrl);
            return $('<span><img src="' + baseUrl + '" class="img-flag " style="width:200px;"/> ' + state.text + '</span>');
        }
    </script>
@endsection
