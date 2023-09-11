@extends('dashboard.app')

@section("title") Adult Games List @endsection

@section('content')

@component("component.breadcrumb",["data"=>[

]])
@slot("last") Adult Games List @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        @component("component.card")
        @slot('icon') <i class="feather-file text-primary"></i> @endslot
        @slot('title') Adult Games List @endslot
        @slot('button')

        @endslot
        @slot('body')
        <div class="table-responsive">
            <table class="table  table-hover mb-0">
                <thead>
                    <tr>
                        
                        <th scope="col">id</th>
                        <th scope="col">Logo</th>
                        <th scope="col">နာမည်</th>
                        <th scope="col">Link </th>
                        <th scope="col">Controls</th>
                        <th scope="col">Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adults as $s)
                    <tr>
                        <td style="width: 14px;"> {{ $s->id }}</td>
                        <td style="width: 55px;"> <img class=" " style="width:57px;" src="{{ $s->logo }}" /></td>
                        <td>{{$s->name}}
                        <td class="justify-content-around">
                                        @isset($s->link1)
                                            @if(str_contains($s->link1, 'drive.google'))
                                                <a target="_blank" href="{{ $s->link1 }}" class="btn btn-primary btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                    <span class="badge badge-light">1</span>
                                                </a>
                                                @else
                                                <a target="_blank" href="{{ $s->link1 }}" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                    <span class="badge badge-light">1</span>
                                                </a>
                                            @endif
                                        @endisset
                                        @isset($s->link2)
                                                @if(str_contains($s->link2, 'drive.google'))
                                                    <a target="_blank" href="{{ $s->link2 }}" class="btn btn-success btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">2</span>
                                                    </a>
                                                @else
                                                    <a target="_blank" href="{{ $s->link2 }}" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">2</span>
                                                    </a>
                                                @endif
                                        @endisset
                                        @isset($s->link3)
                                                @if(str_contains($s->link3, 'drive.google'))
                                                    <a target="_blank" href="{{ $s->link3 }}" class="btn btn-danger btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">3</span>
                                                    </a>
                                                @else
                                                    <a target="_blank" href="{{ $s->link3 }}" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">3</span>
                                                    </a>
                                                @endif
                                        @endisset
                                    </td>
                        <td>
                            <div class="d-inline-flex">
                                <form action="{{ route('adult.destroy',$s->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                        <i class="feather-trash-2"></i>
                                    </button>
                                </form>
                                <a target="" href="{{ route('adult.edit',$s->id) }}" class="btn ml-2 btn-outline-warning btn-sm">
                                    <i class="feather-edit"></i>
                                </a>
                            </div>

                        </td>
                        <td>{{$s->created_at->diffForHumans()}}</td>
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
        "order": [
            [0, "desc"]
        ]
    });
    $(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").parent().addClass("px-0");
</script>
@endsection
