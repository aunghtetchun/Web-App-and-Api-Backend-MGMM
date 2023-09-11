@extends('dashboard.app')

@section("title") Comment List @endsection

@section('content')

@component("component.breadcrumb",["data"=>[

]])
@slot("last") Comment List @endslot
@endcomponent


<div class="row">
    <div class="col-12">
        @component("component.card")
        @slot('icon') <i class="feather-file text-primary"></i> @endslot
        @slot('title') Comment List @endslot
        @slot('button')
        <a href="{{ route('post.index') }}" class="btn btn-sm btn-outline-primary">
            <i class="fas fa-list fa-fw"></i> All
        </a>
        @endslot
        @slot('body')
        <div class="table-responsive">
            <table class="table  table-hover mb-0 table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width: 55px;">နာမည်</th>
                        <th scope="col" style="max-width:165px;">ကွန်မန့်</th>
                        <th scope="col">ဂိမ်း</th>
                        <th scope="col">Link</th>
                        <th scope="col">Controls</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\Comment::latest()->get() as $p)
                    @if($p->getPost)

                    <tr>
                        <th scope="row">{{ $p->id }}</th>
                        @if($p->getUser)
                        <td>{{$p->getUser->name}}</td>
                        @endif
                        <td>{{ $p->comment }}
                        </td>
                        <td>{{ $p->getPost->name }}</td>
                        <td class="justify-content-around">
                            @isset($p->getPost->link1)
                            @if(str_contains($p->getPost->link1, 'drive.google'))
                            <a target="_blank" href="{{ $p->getPost->link1 }}" class="btn btn-primary btn-sm mt-1"><i class="feather-arrow-down"></i>
                                <span class="badge badge-light">1</span>
                            </a>
                            @else
                            <a target="_blank" href="{{ $p->getPost->link1 }}" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                <span class="badge badge-light">1</span>
                            </a>
                            @endif
                            @endisset
                            @isset($p->getPost->link2)
                            @if(str_contains($p->getPost->link2, 'drive.google'))
                            <a target="_blank" href="{{ $p->getPost->link2 }}" class="btn btn-success btn-sm mt-1"><i class="feather-arrow-down"></i>
                                <span class="badge badge-light">2</span>
                            </a>
                            @else
                            <a target="_blank" href="{{ $p->getPost->link2 }}" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                <span class="badge badge-light">2</span>
                            </a>
                            @endif
                            @endisset
                            @isset($p->getPost->link3)
                            @if(str_contains($p->getPost->link3, 'drive.google'))
                            <a target="_blank" href="{{ $p->getPost->link3 }}" class="btn btn-danger btn-sm mt-1"><i class="feather-arrow-down"></i>
                                <span class="badge badge-light">3</span>
                            </a>
                            @else
                            <a target="_blank" href="{{ $p->getPost->link3 }}" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                <span class="badge badge-light">3</span>
                            </a>
                            @endif
                            @endisset
                        </td>
                        <td>
                            <div class="d-inline-flex">
                                {{-- @if($p->user_id==auth()->user()->id || auth()->user()->id==3) --}}
                                <a target="" href="{{ route('post.edit',$p->post_id) }}" class="btn mr-2 btn-outline-warning btn-sm">
                                    <i class="feather-edit"></i>
                                </a>
                                <form action="{{ route('comment.destroy',$p->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                        <i class="feather-trash-2"></i>
                                    </button>
                                </form>
                                {{-- @endif --}}
                                <a target="_blank" href="{{ route('post.show',$p->post_id) }}" class="btn ml-2 btn-outline-success btn-sm">
                                    <i class="feather-eye"></i>
                                </a>
                            </div>




                        </td>

                    </tr>
                    @endif

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