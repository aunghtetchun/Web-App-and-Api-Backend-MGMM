@extends('dashboard.app')

@section("title") Game Search History @endsection

@section('content')

@component("component.breadcrumb",["data"=>[

]])
@slot("last") Game Search History @endslot
@endcomponent

<div class="row">
    <div class="col-12" >
        @component("component.card")
        @slot('icon') <i class="feather-file text-primary"></i> @endslot
        @slot('title') Game Search History @endslot
        @slot('button')

        @endslot
        @slot('body')
        <div style="overflow:scroll">
                <table class="table table-bordered table-hover mb-0" style="overflow:scroll">
                    <thead>
                    <tr>
                        <th scope="col">ရှာသည့်အကြိမ်ရေ</th>
                        <th scope="col">ရှာသည့်စာသား</th>
                       <th scope="col">တွေ့သည့်ဂိမ်းအရေအတွက်</th>
                       <th scope="col">ရှာသည့်အချိန်</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($searchKeywords as $p)
                        <tr>
                            <td scope="row">{{ App\SearchKeyword::where('keywords', 'LIKE', "%{$p->keywords}%")->count() }} ကြိမ်</td>
                            <td>{{ $p->keywords }}</td>
                            <td >{{ App\Post::where('name', 'LIKE', "%{$p->keywords}%")->count() }} ဂိမ်း</td>
                            <td>{{ $p->created_at->diffForHumans() }}</td>
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
