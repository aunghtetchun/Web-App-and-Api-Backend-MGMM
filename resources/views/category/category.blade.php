@extends('dashboard.app')

@section("title") Category Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Category" => "category.category",
    ]])
        @slot("last")  @endslot
    @endcomponent

    <div class="row">
        @if(auth()->user()->id==3)
        <div class="col-12 col-md-9">
            @if(isset($category))
                @component("component.card")
                    @slot('icon') <i class="feather-file text-primary"></i> @endslot
                    @slot('title') Edit Category @endslot
                    @slot('button')  @endslot
                    @slot('body')
                        <div>
                            <form action="{{ route('category.update',$category->id )}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-row align-items-end">
                                    <div class="col-12 col-md-6">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $category->title }}" placeholder="Title">
                                        @error('title')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <!-- <div class="col-12 col-md-2">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                        @error('password')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div> -->
                                    <div class="col-12 col-md-4">
                                        <button type="submit" class="btn btn-primary form-control" ><i class="fas fa-plus-square mr-1"></i> Update Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endslot
                @endcomponent
            @else
                @component("component.card")
                    @slot('icon') <i class="feather-file text-primary"></i> @endslot
                    @slot('title') Add Category @endslot
                    @slot('button')  @endslot
                    @slot('body')
                        <div>
                            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row align-items-end">
                                    <div class="col-12 col-md-6">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}" placeholder="Title">
                                        @error('title')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <!-- <div class="col-12 col-md-2">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                        @error('password')
                                        <small class="invalid-feedback font-weight-bold" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div> -->
                                    <div class="col-12 col-md-4">
                                        <button type="submit" class="btn btn-primary form-control" ><i class="fas fa-plus-square mr-1"></i> Add Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endslot
                @endcomponent
            @endif
        </div>
        @endif
        <div class="col-12 col-md-9">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Category List @endslot
                @slot('button') @endslot
                @slot('body')
                        <div class="table-responsive">
                            <table class="table  table-hover mb-0 table-hover">
                                <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Controls</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Category::latest()->get() as $c)
                                <tr>
                                    <th scope="row">{{ $c->id }}</th>
                                    <td>{{ $c->title }}</td>
                                    <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                        <a href="{{ route('category.edit',$c->id) }}" class="btn mr-2 btn-outline-warning btn-sm">
                                            <i class="feather-edit"></i>
                                        </a>
                                    </td>
                                    <td>{{ $c->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
