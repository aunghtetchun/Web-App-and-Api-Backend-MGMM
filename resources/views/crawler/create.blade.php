@extends('dashboard.app')

@section("title") Add Game @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Crawler" => route("scraper.gameList"),
    ]])
        @slot("last") Add Game @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-xl-5">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Game @endslot
                @slot('button')
                    <a href="{{ route('scraper.gameList') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('scraper.storeGame') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row justify-content-between ">
                                <div class="form-group col-12">
                                    <div class="form-group">
                                        <label for="url">Game URL</label>
                                        <input required type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="url" value="{{old('url')}}" placeholder="">
                                        @error('url')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="keywords">Search Keywords</label>
                                        <textarea rows="9" required class="form-control @error('keywords') is-invalid @enderror" name="keywords"  id="keywords">{{old('keywords')}}</textarea>
                                        @error('keywords')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <select name="website" id="website" class="form-control select2">
                                            <option selected disabled>Select Website</option>
                                                <option value="https://apkaward.com/">Apkaward</option>
                                                <option value="https://modyolo.com/">Modyolo</option>
                                                <option value="https://an1.com/">AN1</option>
                                                <option value="https://rexdl.com/">Rexdl</option>
                                                <option value="https://revdl.com/">RevDL</option>
                                        </select>
                                        @error('website')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tag_id">Select Tags</label>
                                        <select name="tag_id[]" id="tag_id" class="form-control select2" multiple="multiple">
                                            @foreach(\App\Category::latest()->get() as $c)
                                                <option value="{{ $c->id }}" >{{ $c->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('tag_id')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" id="category_id" class="form-control select2">
                                            <option selected disabled>Select Category</option>
                                            @foreach(\App\Category::latest()->get() as $c)
                                                <option value="{{$c->id}}">{{$c->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="video">Gameplay Video</label>
                                        <input required type="text"col-md-6 value="#" class="form-control @error('video') is-invalid @enderror" name="video" id="video" value="{{old('video')}}" placeholder="Gameplay Video">
                                        @error('video')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Game</button>
                        </form>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')
    <script>
       
    </script>
@endsection
