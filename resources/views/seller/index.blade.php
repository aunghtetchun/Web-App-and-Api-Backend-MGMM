@extends('dashboard.app')

@section("title") Seller List @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Seller List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Seller List @endslot
                @slot('button')
                    <a href="{{ route('seller.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i> All
                    </a>
                        
                        <a href="{{ route('seller.create') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus fa-fw"></i> Add Seller
                        </a>
                @endslot
                @slot('body')
                    <div class="table-responsive">
                        <table class="table  table-hover mb-0 table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Profile</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Nrc</th>
                                <th scope="col">Level</th>
                                <th scope="col">Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sellers as $p)
                                <tr >
                                    <th scope="row">{{ $p->id }}</th>
                                    <td>
                                        <img src="{{$p->profile}}" style="width:100px;" alt="">
                                    </td>                                    
                                    <td>{{$p->name}}</td>                                    
                                    <td>{{$p->phone}}</td>                                    
                                    <td>( {{$p->nrc}} )</td>                                    
                                    <td>
                                        <p class="badge badge-pill badge-success px-3 py-2">{{ $p->level}}</p>
                                    </td>                                   
                                    <td>
                                        <div class="d-inline-flex">
                                            <a target="" href="{{ route('seller.edit',$p->id) }}" class="btn mr-2 btn-outline-warning btn-sm">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a target="_blank" href="{{ route('seller.show',$p->id) }}" class="btn ml-2 btn-outline-success btn-sm">
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
