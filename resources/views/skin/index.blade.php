@extends('dashboard.app')

@section("title") Skin List @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Skin List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Skin List @endslot
                @slot('button')
                    <a href="{{ route('skin.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i> All
                    </a>
                        
                        <a href="{{ route('skin.create') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus fa-fw"></i> Add Skin
                        </a>
                @endslot
                @slot('body')
                    <div class="table-responsive">
                        <table class="table  table-hover mb-0 table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo</th>
                                <th scope="col">အမျိုးအစား</th>
                                <th  scope="col">နာမည်</th>
                                <th scope="col">Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($skins as $p)
                                <tr >
                                    <th scope="row">{{ $p->id }}</th>
                                    <td>
                                    <img class="rounded mr-2 border border-danger" src="{{ asset("/storage/skin/".$p->url) }}" alt="" style="width: 225px;">
                                    </td>                                    
                                    <td>
                                        <p class="badge badge-pill badge-success p-2">{{ $p->type}}</p>
                                    </td>
                                    <td>
                                        {{$p->name}}
                                    </td>
                                    <td>
                                        <div class="d-inline-flex">
                                            <a target="" href="{{ route('skin.edit',$p->id) }}" class="btn mr-2 btn-outline-warning btn-sm">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <form action="{{ route('skin.destroy',$p->id) }}"  method="post">
                                               @csrf
                                               @method("DELETE")
                                               <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                                   <i class="feather-trash-2"></i>
                                               </button>
                                            </form> 
                                            <!-- <a target="_blank" href="{{ route('skin.show',$p->id) }}" class="btn ml-2 btn-outline-success btn-sm">
                                                <i class="feather-eye"></i>
                                            </a> -->
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
