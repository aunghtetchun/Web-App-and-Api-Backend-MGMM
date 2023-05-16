@extends('dashboard.app')

@section("title") Rating List @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Rating List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Rating List @endslot
                @slot('button')
                @endslot
                @slot('body')
                    <div>
                        <table class="table table-bordered table-hover table-responsive-sm table-responsive-md mb-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Controls</th>
                                <th scope="col">Created_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Rating::latest()->get() as $r)
                                <tr>
                                    <th scope="row">{{ $r->id }}</th>
                                    <td>
                                        <img src="{{ asset("/storage/logo/".$r->getPost->logo) }}" alt="" style="width: 40px;">
                                    </td>
                                    <td>{{ $r->getPost->name }}</td>
                                    <td>
                                        @for($i=1; $i<=$r->rating; $i++)
                                            <i class="fas fa-star fa-fw" style="color: rgba(0,73,255,0.91)"></i>
                                        @endfor
                                    </td>
                                    <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                        <form action="{{ route('rating.destroy',$r->id) }}"  method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                                <i class="feather-trash-2"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>{{ $r->created_at }}</td>
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
