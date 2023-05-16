@extends('dashboard.app')

@section("title") See Game @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Game" => "#",
    ]])
        @slot("last") See Game @endslot
    @endcomponent
    
@endsection
@section('foot')

@endsection
