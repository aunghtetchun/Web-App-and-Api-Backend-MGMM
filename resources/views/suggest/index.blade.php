@extends('dashboard.app')

@section("title") Broken Links List @endsection

@section('content')

@component("component.breadcrumb",["data"=>[

]])
@slot("last") Broken Links List @endslot
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
                        
                        <th scope="col">id</th>
                        <th scope="col">နာမည်</th>
			            <th scope="col">Err အမျိုးအစား </th>
                        <th scope="col">Link </th>
                        <th scope="col">Controls</th>
                        <th scope="col">အမျိုးအစား</th>
                        <th scope="col">Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Suggest::latest()->get() as $s)
                    <tr>
                        <td> {{ $s->id }}</td>
                        <td >
                            @if(isset($s->post_id) && isset($s->getPost))
                            {{ $s->getPost->name}}
                            @elseif(isset($s->software_id) && isset($s->getSoftware))
                            {{ $s->getSoftware->name}}
                            @elseif(isset($s->adult_id) && isset($s->getAdult))
                                {{$s->getAdult->name}}
                                            @endif
                        </td>

			<td>{{$s->error_type}}</td>
                        <td class="justify-content-around">
                                        @isset($s->getPost->link1)
                                            @if(str_contains($s->getPost->link1, 'drive.google'))
                                                <a target="_blank" href="{{ $s->getPost->link1 }}" class="btn btn-primary btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                    <span class="badge badge-light">1</span>
                                                </a>
                                                @else
                                                <a target="_blank" href="{{ $s->getPost->link1 }}" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                    <span class="badge badge-light">1</span>
                                                </a>
                                            @endif
                                        @endisset
                                        @isset($s->getPost->link2)
                                                @if(str_contains($s->getPost->link2, 'drive.google'))
                                                    <a target="_blank" href="{{ $s->getPost->link2 }}" class="btn btn-success btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">2</span>
                                                    </a>
                                                @else
                                                    <a target="_blank" href="{{ $s->getPost->link2 }}" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">2</span>
                                                    </a>
                                                @endif
                                        @endisset
                                        @isset($s->getPost->link3)
                                                @if(str_contains($s->getPost->link3, 'drive.google'))
                                                    <a target="_blank" href="{{ $s->getPost->link3 }}" class="btn btn-danger btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">3</span>
                                                    </a>
                                                @else
                                                    <a target="_blank" href="{{ $s->getPost->link3 }}" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                        <span class="badge badge-light">3</span>
                                                    </a>
                                                @endif
                                        @endisset
                                        @isset($s->getAdult->link1)
                                            @if(str_contains($s->getAdult->link1, 'drive.google'))
                                                <a target="_blank" href="{{ $s->getAdult->link1 }}" class="btn btn-primary btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                    <span class="badge badge-light">1</span>
                                                </a>
                                                @else
                                                <a target="_blank" href="{{ $s->getAdult->link1 }}" class="btn btn-dark btn-sm mt-1"><i class="feather-arrow-down"></i>
                                                    <span class="badge badge-light">1</span>
                                                </a>
                                            @endif
                                        @endisset
                                    </td>
                        <td>
                            <div class="d-inline-flex">
                                <form action="{{ route('suggest.destroy',$s->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                                        <i class="feather-trash-2"></i>
                                    </button>
                                </form>
                                @if(isset($s->post_id))
                                <a target="" href="{{ route('post.edit',$s->post_id) }}" class="btn ml-2 btn-outline-warning btn-sm">
                                    <i class="feather-edit"></i>
                                </a>
                                @elseif(isset($s->software_id))
                                <a target="" href="{{ route('software.edit',$s->software_id) }}" class="btn ml-2 btn-outline-warning btn-sm">
                                    <i class="feather-edit"></i>
                                </a>
				@else
					 <a target="" href="{{ route('adult.edit',$s->adult_id) }}" class="btn ml-2 btn-outline-warning btn-sm">
                                    <i class="feather-edit"></i>
                                </a>
                                @endif
                            </div>

                        </td>
                        <td>{{ $s->type }}</td>
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
