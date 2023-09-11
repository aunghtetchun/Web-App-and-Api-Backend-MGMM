@extends('dashboard.app')

@section("title") Message List @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Message List @endslot
    @endcomponent
    

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Message List @endslot
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
                                <th  scope="col">နာမည်</th>
                                <th scope="col">ဖုန်းနံပါတ်</th>
                                <th scope="col">မက်ဆေ့</th>
                                <th scope="col">Created At</th>
                                {{-- <th scope="col">Controls</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(App\Message::latest()->get() as $p)

                                <tr >
                                    <th scope="row">{{ $p->id }}</th>
                                 @if(isset($p->getUser))
                                    <td>{{ $p->getUser->name }}</td>
                                    <td>{{ $p->getUser->email }}</td>
                                    <td>{{ $p->message }}</td>
                                    <td>{{ $p->created_at->diffForHumans() }}</td>
                                @endif
                                    {{-- <td>
                                        <div class="d-inline-flex">
                                            <a target="" href="{{ route('post.edit',$p->post_id) }}" class="btn mr-2 btn-outline-warning btn-sm">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <form action="{{ route('comment.destroy',$p->id) }}"  method="post">
                                               @csrf
                                               @method("DELETE")
                                               <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                                   <i class="feather-trash-2"></i>
                                               </button>
                                            </form> 
                                            <a target="_blank" href="{{ route('post.show',$p->post_id) }}" class="btn ml-2 btn-outline-success btn-sm">
                                                <i class="feather-eye"></i>
                                            </a>
                                        </div>
                                    </td> --}}

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
