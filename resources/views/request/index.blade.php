@extends('dashboard.app')

@section("title") Request App List @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Request App List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Request App List @endslot
                @slot('button')

                @endslot
                @slot('body')
                        <div class="table-responsive">
                            <table class="table  table-hover mb-0 table-hover">
                                <thead>
                                <tr>
                                <th scope="col">App Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Playstore Link</th>
                                <th scope="col">Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\RequestApp::latest()->get() as $rq)
                                <tr>
                                    <td>{{ $rq->app_name }}</td>
                                    <td>{{ $rq->username }}</td>
                                    <td>{{ $rq->phone }}</td>
                                    <td>
                                        <a href="{{ $rq->playstore_link }}" class="btn btn-outline-primary btn-sm mt-1"> <i class="feather-link"></i> Click</a>
                                    <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                        <form class="d-inline-block" action="{{ route('request_app.destroy',$rq->id) }}"  method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                                <i class="fa-fw feather-trash-2"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('request_app.show',$rq->id) }}" class="btn ml-2 btn-outline-success btn-sm">
                                            <i class="feather-eye"></i>
                                        </a>
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
