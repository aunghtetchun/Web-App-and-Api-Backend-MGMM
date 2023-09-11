@extends('dashboard.app')

@section("title") Game List @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Game List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Game List @endslot
                @slot('button')
                    <a href="{{ route('post.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i> All
                    </a>
                        <a href="{{ route('post.reviewFilter') }}" class="btn btn-sm btn-outline-success">
                            <i class="fas fa-bookmark fa-fw"></i> Review
                        </a>
                        <a href="{{ route('post.noreviewFilter') }}" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-bookmark fa-fw"></i> No Review
                        </a>
{{--                        <a href="{{ route('post.driveFilter') }}" class="btn btn-sm btn-outline-success">--}}
{{--                            <i class="fab fa-google-drive fa-fw"></i> Drive--}}
{{--                        </a>--}}
{{--                        <a href="{{ route('post.nodriveFilter') }}" class="btn btn-sm btn-outline-danger">--}}
{{--                            <i class="fab fa-google-drive fa-fw"></i> No Drive--}}
{{--                        </a>--}}
                        <a href="{{ route('post.modFilter') }}" class="btn btn-sm btn-outline-success">
                            <i class="fas fa-lock-open fa-fw"></i> Mod
                        </a>
                        <a href="{{ route('post.noModFilter') }}" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-lock fa-fw"></i> No Mod
                        </a>
                        <a href="{{ route('post.create') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus fa-fw"></i> Add Post
                        </a>
                @endslot
                @slot('body')
                    <div class="table-responsive">
                        <table class="table  table-hover mb-0 table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th  scope="col">ဂိမ်းနာမည်</th>
                                <th scope="col">Keywords</th>
                                <th scope="col">Link</th>
                                <th scope="col">ဂိမ်းတင်သူ</th>
                                <th scope="col">Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $p)
                                <tr >
                                    <th scope="row">{{ $p->id }}</th>
                                    <td >
                                        <div class="d-inline-flex">
                                            <img class="rounded mr-2 border border-danger" src="{{ asset("/storage/logo/".$p->logo) }}" alt="" style="width: 45px;">
                                            <div class="d-flex align-items-center">
                                                {{ Str::words($p->name,3, '...')  }}
                                            </div>
                                        </div>

                                    </td>
                                   
                                    <td>{{ $p->keywords }}</td>
                                    <td class="justify-content-around">
                                        @isset($p->link1)
                                            @if(str_contains($p->link1, 'drive.google'))
                                                <a target="_blank" href="{{ $p->link1 }}" class="btn btn-primary btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                    <span class="badge badge-light">1</span>
                                                </a>
                                                @else
                                                <a target="_blank" href="{{ $p->link1 }}" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                    <span class="badge badge-light">1</span>
                                                </a>
                                            @endif
                                        @endisset
                                        @isset($p->link2)
                                                @if(str_contains($p->link2, 'drive.google'))
                                                    <a target="_blank" href="{{ $p->link2 }}" class="btn btn-success btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">2</span>
                                                    </a>
                                                @else
                                                    <a target="_blank" href="{{ $p->link2 }}" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">2</span>
                                                    </a>
                                                @endif
                                        @endisset
                                        @isset($p->link3)
                                                @if(str_contains($p->link3, 'drive.google'))
                                                    <a target="_blank" href="{{ $p->link3 }}" class="btn btn-danger btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">3</span>
                                                    </a>
                                                @else
                                                    <a target="_blank" href="{{ $p->link3 }}" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">3</span>
                                                    </a>
                                                @endif
                                        @endisset
                                    </td>
                                    <td>
                                        <p class="badge badge-pill badge-success p-2">{{ $p->getUser->name}}</p>
                                    </td>
                                    <td>
                                        <div class="d-inline-flex">
                                            @if($p->user_id==auth()->user()->id || auth()->user()->role==1)
                                            <a target="_blank" href="{{ route('post.edit',$p->id) }}" class="btn mr-2 btn-outline-warning btn-sm">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <form action="{{ route('post.destroy',$p->id) }}"  method="post">
                                               @csrf
                                               @method("DELETE")
                                               <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                                   <i class="feather-trash-2"></i>
                                               </button>
                                            </form> 
                                            @endif
                                            <a target="_blank" href="{{ route('post.show',$p->id) }}" class="btn ml-2 btn-outline-success btn-sm">
                                                <i class="feather-eye"></i>
                                            </a>
                                        </div>




                                    </td>

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
@section("foot")
    <script>
        $(".table").dataTable({
            "order": [[0, "desc" ]]
        });
        $(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").parent().addClass("px-0");
    </script>
@endsection
