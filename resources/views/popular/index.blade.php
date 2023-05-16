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
                @slot('title') Popular List @endslot
                @slot('button')
                    <a href="{{ route('popular.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i> All
                    </a>

                        <a href="{{ route('popular.create') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus fa-fw"></i> Add Popular
                        </a>
{{--                        <form action="{{ route('popular.destroyAll') }}"  method="post">--}}
{{--                            @csrf--}}
{{--                            @method("DELETE")--}}
{{--                            <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">--}}
{{--                                <i class="feather-trash-2"></i>--}}
{{--                            </button>--}}
{{--                        </form>--}}
                @endslot
                @slot('body')
                    <div class="table-responsive">
                        <table class="table  table-hover mb-0 table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Title</th>
                                <th scope="col">Name</th>
                                <th scope="col">Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($populars as $p)
                                <tr >
                                    <th scope="row">{{ $p->id }}</th>
                                    <td>
                                        <img class="rounded mr-2 border border-danger" src="{{ asset("/storage/logo/".$p->logo) }}" alt="" style="width: 45px;">
                                    </td>
                                    <td >
                                        <div class="d-inline-flex">
                                            <div class="d-flex align-items-center">
                                                {{ Str::words($p->title,5, '...')  }}
                                            </div>
                                        </div>

                                    </td>
                                    <td><a target="_blank" href="{{ $p->link }}" class="btn btn-primary btn-sm">{{ $p->name }}</a>
                                    </td>
                                    <td>
                                        <div class="d-inline-flex">
{{--                                            <a target="_blank" href="{{ route('popular.edit',$p->id) }}" class="btn mr-2 btn-outline-warning btn-sm">--}}
{{--                                                <i class="feather-edit"></i>--}}
{{--                                            </a>--}}
                                            <form action="{{ route('popular.destroy',$p->id) }}"  method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                                    <i class="feather-trash-2"></i>
                                                </button>
                                            </form>
{{--                                            <a target="_blank" href="{{ route('popular.show',$p->id) }}" class="btn ml-2 btn-outline-success btn-sm">--}}
{{--                                                <i class="feather-eye"></i>--}}
{{--                                            </a>--}}
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
