@extends('dashboard.app')

@section("title") User List @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") User List @endslot
    @endcomponent
    

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') User List @endslot
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
                                <th scope="col">မက်ဆေ့ပို့ရန်</th>
                                <th scope="col">သိမ်းထားသောဂိမ်း</th>
                                <th scope="col">Created At</th>
                                {{-- <th scope="col">Controls</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(App\User::latest()->get() as $p)

                                <tr >
                                    <th scope="row">{{ $p->id }}</th>
                                 
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                                            <i class="feather-message-square"></i>
                                          </button>
                                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('user.sendMessage') }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-row align-items-end">
                                                            <div class="col-12 col-md-8">
                                                                <label for="message">Message</label>
                                                                <input type="hidden" name="user_id" value="{{$p->id}}">
                                                                <input type="text" class="form-control @error('message') is-invalid @enderror" name="message" id="message" value="{{old('message')}}" placeholder="မက်ဆေ့စာသား">
                                                                @error('message')
                                                                <small class="invalid-feedback font-weight-bold" role="alert">
                                                                    {{ $message }}
                                                                </small>
                                                                @enderror
                                                            </div>
                                                            <div class="col-12 col-md-4">
                                                                <button type="submit" class="btn btn-primary form-control" ><i class="fas fa-plus-square mr-1"></i> Send Message</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </td>
                                    <td>{{ $p->getSaveGames->count() }} </td>
                                    <td>{{ $p->created_at->diffForHumans() }}</td>
                                    
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
