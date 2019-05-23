@extends('admin.layouts.admin')

@section('title', "Member Management")

@section('content')
    <link href="{{ asset('admin/css/userstyles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" border="0">
            <thead>
            <tr>
                

                    <div class="demptable">
                        {{ link_to_route('admin.member.add', 'Add member', null, ['class' => 'btn btn-primary']) }}
                        {{-- {{ link_to_route('admin.patient.chartView', 'Report', null, ['class' => 'btn btn-primary']) }} --}}
                        <div class="right-searchbar">
                                <!-- Search form -->
                                <form action="searchMember" method="post" class="form-inline">
                                        {{ csrf_field() }}
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search" required />
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                                    </div>
                                    {{-- <i class="fa fa-search" aria-hidden="true"></i> --}}
                                </form>
                            </div>
                        
                    </div>

                    
            </tr>
            </thead>
        </table>
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif

            <div class="row">
                @foreach($members as $member)

            <div class="col-xs-6 col-sm-3">
                <div class="dcard">
                    <div class="row">
                        <div class="dcard-header">
                            <div class="dcard-body text-center" style="font-size: larger; color: white">
                                <span class="dcard-title ">{{$member->name}}</span><br />
                                <span class="dcard-title ">{{$member->contact}}</span><br />
                            </div>
                        <br/>
                            <div class="dcard-body text-center">
                                <img src="\image\member\pic\{{$member->mbr_pic}}" alt="Pic" height="90" width="90"class="img-circle">
                            </div>
                            {{-- <span class="card-img">{{ HTML::image('img/nickfrost.jpg', 'Pic') }}</span> --}}

                        </div>
                    </div>
                    <div class="dcard-body text-center">
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.member.show',[$member->id]) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{  route('admin.member.edit',[$member->id]) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-xs btn-danger" href="{{ route('admin.member.delete',[$member->id]) }}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        <div class="pull-right">
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
@endsection
@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}


@endsection