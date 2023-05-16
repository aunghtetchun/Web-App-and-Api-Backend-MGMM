@extends('dashboard.app')

@section("title") See Suggest @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Suggest" => "#",
    ]])
        @slot("last") See Suggest @endslot
    @endcomponent
    <div class="row">
        <div class="col-12 col-md-11 col-lg-10">
            @component("component.card")
                @slot('icon') <i class="fa-fw feather-file text-primary"></i> @endslot
                @slot('title') Suggest @endslot
                @slot('button')
                    <a href="{{ route('suggest.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fa-fw fas fa-list fa-fw"></i>
                    </a>
                    <form class="d-inline-block" action="{{ route('suggest.destroy',$suggest->id) }}"  method="post">
                        @csrf
                        @method("DELETE")
                        <button onClick="return confirm('Are you sure you want to delete?')" class="btn btn-sm btn-outline-danger text-left">
                            <i class="fa-fw feather-trash-2"></i>
                        </button>
                    </form>
                @endslot
                @slot('body')
                    <div class="card-body">
                        <table class="table table-bordered table-responsive-sm table-responsive-md">
                            <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $suggest->name }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $suggest->phone }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $suggest->email }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{ $suggest->description }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')

@endsection
