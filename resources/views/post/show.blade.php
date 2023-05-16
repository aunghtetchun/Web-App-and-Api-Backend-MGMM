@extends('dashboard.app')

@section("title") See Game @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Game" => "#",
    ]])
        @slot("last") See Game @endslot
    @endcomponent
    <div class="row">
        <div class="col-12 col-md-11 col-lg-9">
            @component("component.card")
                @slot('icon') <i class="fa-fw feather-file text-primary"></i> @endslot
                @slot('title') Game @endslot
                @slot('button')
                    <a href="{{ route('post.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fa-fw fas fa-list fa-fw"></i>
                    </a>
                    <a href="{{ route('post.edit',$post->id) }}" class="btn  btn-outline-warning btn-sm">
                        <i class="fa-fw feather-edit"></i>
                    </a>
                    <form class="d-inline-block" action="{{ route('post.destroy',$post->id) }}"  method="post">
                        @csrf
                        @method("DELETE")
                        <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                            <i class="fa-fw feather-trash-2"></i>
                        </button>
                    </form>
                @endslot
                @slot('body')
                    <div class="card-body">
                        @isset($post)
                            <div class="d-flex flex-wrap justify-content-around ">
                                <div class="col-3 col-xs-12 col-md-2 px-0 my-3">
                                    <img class="rounded" src="{{ asset("/storage/logo/".$post->logo) }}" style="width: 100%;  margin-bottom: 5px;" alt="">
                                </div>
                                <div class="col-9 col-md-10 text-center my-3">
                                    <h4 class="font-weight-bold">{{ $post->name }}</h4>
                                    <div class="star pt-4"  style="font-size: 30px; color: #ffd208">
                                        @for($i=1; $i<=5; $i++)
                                            @if($i<=floor(collect($post->getRating->pluck('rating'))->avg()) )
                                                <i class="fas fa-star fa-fw"></i>
                                            @else
                                                <i class="far fa-star fa-fw"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <div class="col-12 my-3">
                                    <div class="d-flex flex-wrap justify-content-center align-items-center">
                                        <div class="col-6 px-0 col-md-4 col-lg-4">
                                            <b class="font-weight-bolder">Developer</b>
                                            <p>{{ $post->developer }}</p>
                                        </div>
                                        <div class="col-6 px-0 col-md-4 col-lg-4">
                                            <b class="font-weight-bolder">Updated</b>
                                            <p>{{ $post->updated }}</p>
                                        </div>
                                        <div class="col-6 px-0 col-md-4 col-lg-4">
                                            <b class="font-weight-bolder">Size</b>
                                            <p>{{ $post->size }}</p>
                                        </div>
                                        <div class="col-6 px-0 col-md-4 col-lg-4">
                                            <b class="font-weight-bolder">Version</b>
                                            <p>{{ $post->version }}</p>
                                        </div>
                                        <div class="col-6 px-0 col-md-4 col-lg-4">
                                            <b class="font-weight-bolder">Requirements</b>
                                            <p>{{ $post->requirement }}</p>
                                        </div>
                                        <div class="col-6 px-0 col-md-4 col-lg-4">
                                            <b class="font-weight-bolder">Type</b>
                                            <p>{{ $post->type }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-right mt-3 d-flex flex-wrap justify-content-end">
                                        <div class="col-12 col-md-4">
                                            <a href="{{ $post->link1 }}" class="btn btn-block btn-primary mb-2"><i class="fas feather-arrow-down"></i> Download</a>
                                        </div>
                                        @isset($post->link2)
                                        <div class="col-12 col-md-4">

                                                <a href="{{ $post->link2 }}" class="btn btn-block btn-success mb-2"><i class="fas feather-arrow-down"></i> Download</a>
                                        </div>
                                        @endisset
                                        @isset($post->link3)
                                        <div class="col-12 col-md-4">
                                               <a href="{{ $post->link3 }}" class="btn btn-block btn-danger mb-2"><i class="fas feather-arrow-down"></i> Download</a>
                                       </div>
                                        @endisset
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex flex-wrap g_img">
                                <h4 class="col-12 font-weight-bolder text-center my-4">Gameplay Photo</h4>
                            @foreach($post->getPhoto as $photo)
                                    <div class="p-2 col-12 col-md-4">
                                        <a class="venobox" data-gall="myGallery" href="{{ asset("/storage/post/".$photo->name) }}">
                                            <img class="w-100 rounded" src="{{ asset("/storage/post/".$photo->name) }}" alt="" >
                                        </a>
                                    </div>
                                @endforeach
                                    <div class="col-12 text-center my-4">
                                        <h4 class="col-12 font-weight-bolder my-4">Gameplay Video</h4>
                                        <iframe width="100%" height="333px" src="https://www.youtube.com/embed/{!! $post->video !!}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                    </div>
                                    <div class="col-12">
                                        <h4 class="col-12 font-weight-bolder my-4 text-center">Game Description</h4>
                                        {!! $post->description !!}
                                    </div>
                                <div class="col-12">
                                    <h4 class="col-12 font-weight-bolder text-center my-4">Mod Features</h4>
                                    {!! $post->features !!}
                                </div>
                            </div>
                        @endisset
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')

@endsection
