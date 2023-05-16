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
                    <a href="{{ route('post.create') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-plus fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                    <div class="table-responsive">
                        <table class="table  table-hover mb-0 table-hover">
                            <thead>
                            <tr>
                                {{--                                <th scope="col">#</th>--}}
                                <th  scope="col">Ads</th>
                                <th scope="col">Link</th>
                                <th scope="col">Position</th>
                                <th scope="col">Controls</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ads as $a)
                                <tr >
                                    {{--                                    <th scope="row">{{ $a->id }}</th>--}}
                                    <td >
                                        <div class="p-0">
                                            <a class="venobox" data-gall="myGallery" href="{{ asset("/storage/ads/".$a->photo) }}">
                                                <img class="w-100 border border-danger rounded" src="{{ asset("/storage/ads/".$a->photo) }}" alt="" style="height: 50px;">
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ $a->link }}" class="btn btn-outline-primary btn-sm mt-1"> <i class="feather-link"></i> Click</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn disabled btn-outline-success btn-sm mt-1">

                                            @if($a->type==1)
                                                <i class="feather-arrow-up"></i>
                                                Top
                                            @elseif($a->type==2)
                                                <i class="feather-arrow-left"></i>
                                                Middle
                                            @else
                                                <i class="feather-arrow-down"></i>
                                                Bottom
                                            @endif

                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-inline-flex">
                                            <a href="{{ route('ads.edit',$a->id) }}" class="btn mr-2 btn-outline-warning btn-sm">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <form action="{{ route('ads.destroy',$a->id) }}"  method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                                    <i class="feather-trash-2"></i>
                                                </button>
                                            </form>

                                        </div>

                                    </td>

                                    <td>{{ $a->created_at->diffForHumans() }}</td>
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
