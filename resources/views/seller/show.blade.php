@extends('dashboard.app')

@section("title") Account List @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[

    ]])
        @slot("last") Account List @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Account List @endslot
                @slot('button')
                    <a href="{{ route('account.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i> All
                    </a>
                        
                        <a href="{{ route('account.create') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus fa-fw"></i> Add Account
                        </a>
                @endslot
                @slot('body')
                <h5 class="card-title">{{ $account->title }}</h5>
                    <p class="card-text">{{ $account->description }}</p>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Game ID:</strong> {{ $account->game_id }}</li>
                        <li class="list-group-item"><strong>Server ID:</strong> {{ $account->server_id }}</li>
                        <li class="list-group-item"><strong>Type:</strong> {{ $account->type }}</li>
                        <li class="list-group-item"><strong>Security:</strong> {{ $account->security }}</li>
                        <li class="list-group-item"><strong>Price:</strong> {{ $account->price }}</li>
                        <li class="list-group-item"><strong>Sold:</strong> {{ $account->sold }}</li>
                        <li class="list-group-item"><strong>Created At:</strong> {{ $account->created_at->diffForHumans() }}</li>
                    </ul>
                    
                @endslot
            @endcomponent
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                @if($account->profile)
                    <div class="mb-2">
                        <strong>Profile Photo:</strong><br>
                        <img src="{{ asset('storage/profile/'.$account->profile) }}" class="img-thumbnail" alt="Profile Photo">
                    </div>
                    @endif
                    <div class="d-flex flex-wrap">
                        @foreach($account->skins as $skin)
                            <div class="col-3">
                                <img src="{{ asset('storage/skin/'.$skin->url) }}" class="w-100 img-thumbnail" alt="Profile Photo">
                            </div>                          
                        @endforeach
                    </div>
                </div>
            </div>
       
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
