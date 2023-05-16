@extends('dashboard.app')

@section("title") Popular Game List @endsection

@section('content')

@component("component.breadcrumb",["data"=>[

]])
@slot("last") Popular Game List @endslot
@endcomponent

<div class="row">
    <div class="col-12" >
        @component("component.card")
        @slot('icon') <i class="feather-file text-primary"></i> @endslot
        @slot('title') Popular Game List @endslot
        @slot('button')

        @endslot
        @slot('body')
        <div style="overflow:scroll">
                <table class="table table-bordered table-hover mb-0" style="overflow:scroll">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Logo</th>
                        <th scope="col">ဂိမ်းနာမည်</th>
                        <th scope="col">Category</th>
                        <th scope="col">Viewer</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Controls</th>
{{--                        <th scope="col">Created_at</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Post::get() as $p)
                        <tr>
                            <th scope="row">{{ $p->id }}</th>
                            <td>
                                <img src="{{ asset("/storage/logo/".$p->logo) }}" alt="" style="width: 40px;">
                            </td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->getCategory->title }}</td>
                            
                            <td> 
                                {{ $p->getViewer!='' ? $p->getViewer->count : 0 }}
                                <form action="{{ route('post.viewerDel',$p->id) }}" class="d-inline-block text-center w-75"  method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                        <i class="feather-trash-2"></i>
                                    </button>
                                </form>
                            </td>
                            <td> {{ count($p->getComment)  }}
                                <a href="{{ route('post.showComment',$p->id) }}" class="btn ml-2 btn-outline-success btn-sm">
                                    <i class="feather-eye"></i>
                                </a>
                            </td>
                            <td> {{ count($p->getRating)  }}
                                <a href="{{ route('post.showRating',$p->id) }}" class="btn ml-2 btn-outline-success btn-sm">
                                    <i class="feather-eye"></i>
                                </a>
                            </td>
                            {{--                            <td>{{ $p-> }}</td>--}}
                            <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                <a href="{{ route('post.edit',$p->id) }}" class="btn mr-2 btn-outline-warning btn-sm">
                                    <i class="feather-edit"></i>
                                </a>
{{--                                <form action="{{ route('post.destroy',$p->id) }}"  method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method("DELETE")--}}
{{--                                    <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">--}}
{{--                                        <i class="feather-trash-2"></i>--}}
{{--                                    </button>--}}
{{--                                </form>--}}
                                <a href="{{ route('post.show',$p->id) }}" class="btn ml-2 btn-outline-success btn-sm">
                                    <i class="feather-eye"></i>
                                </a>
                            </td>
{{--                            <td>{{ $p->created_at }}</td>--}}
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
