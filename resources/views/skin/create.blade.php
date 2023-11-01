@extends('dashboard.app')

@section("title") Add Skin @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Skin" => route("skin.index"),
    ]])
        @slot("last") Add Skin @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-8 col-lg-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Add Skin @endslot
                @slot('button')
                    <a href="{{ route('skin.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div>
                        <form action="{{ route('skin.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                    <div class="form-group">
                                        <label for="name">Skin နာမည်</label>
                                        <input required type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="Skin Name">
                                        @error('name')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Skin အမျိုးအစား</label>
                                        <select name="type" id="type" class="form-control" >
                                            <option value="Epic">Epic</option>
                                            <option value="Legend" selected>Legend</option>
                                            <option value="Lightborn">Lightborn</option>
                                            <option value="Collector">Collector</option>
                                            <option value="V.E.N.O.M">V.E.N.O.M</option>
                                            <option value="S.A.B.E.R">S.A.B.E.R</option>
                                            <option value="Zodiac">Zodiac</option>
                                            <option value="CHAMPION">CHAMPION</option>
                                            <option value="Dragon Tamer">Dragon Tamer</option>
                                            <option value="Transformers">Transformers</option>
                                            <option value="Aspirants">Aspirants</option>
                                            <option value="Exorcists">Exorcists</option>
                                            <option value="Jujutsu Kaisen">Jujutsu Kaisen</option>
                                            <option value="Saint Seiya">Saint Seiya</option>
                                            <option value="Star Wars">Star Wars</option>
                                            <option value="Sanrio">Sanrio</option>
                                            <option value="Superhero">Superhero</option>
                                            <option value="Abyss">Abyss</option>
                                            <option value="Blazing Bounties">Blazing Bounties</option>
                                            <option value="The King of Fighters">The King of Fighters</option>
					<option value="Starlight">Starlight</option>
					<option value="Speial">Special</option>
                                        </select>
                                        @error('type')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="form-group justify-content-center align-items-center">
                                        <label for="logo">Skin Photo</label>
                                        <input  required type="file" accept="image/png, .jpeg, .jpg,image/webp, image/gif" class="form-control d-none  p-1 @error('logo') is-invalid @enderror" name="logo" id="logo" value="{{old('logo')}}" onchange="readURL(this);">
                                        @error('logo')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <img id="blah" onclick="$('#logo').trigger('click');" class="w-100 rounded" src="{{asset('dashboard/images/upload.png')}}" alt="your image" />
                                    </div>                                    

                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Add Skin</button>
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
