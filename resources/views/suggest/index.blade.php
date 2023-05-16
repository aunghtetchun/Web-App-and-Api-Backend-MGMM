@extends('dashboard.app')

@section("title") Suggest List @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Suggest List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Suggest List @endslot
                @slot('button')

                @endslot
                @slot('body')
                        <div class="table-responsive">
                            <table class="table  table-hover mb-0">
                                <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Suggest::latest()->get() as $s)
                                <tr>
                                    <td class="text-nowrap" >
                                        {{ $s->name}}
                                    </td>
                                    <td>{{ $s->phone }}</td>
                                    <td >
                                        <div class="d-inline-flex">
                                            <form action="{{ route('suggest.destroy',$s->id) }}"  method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                                    <i class="feather-trash-2"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('suggest.show',$s->id) }}" class="btn ml-2 btn-outline-success btn-sm">
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
