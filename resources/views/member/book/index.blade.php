@extends('member.layouts.member')

@section('title', "Book Management")

@section('content')
    <link href="{{ asset('admin/css/userstyles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <table  class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%" border="0">
            <thead>
            <tr>
                

                    <div class="demptable">
                       <div class="right-searchbar">
                                <!-- Search form -->
                                <form action="searchBook" method="post" class="form-inline">
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
        @php
    
        use Illuminate\Support\Facades\DB;
        $email=auth()->user()->email;
        @endphp
            <div class="row">
                @foreach($Books as $Book)

                @php
                $IDs = DB::table('book_author')->where('id', $Book->authorid)->get();
                $author_name = "pandding";
                        foreach($IDs as $ID)
                        {
                            $author_name=$ID->name;
                            
                        }
                
                @endphp
            <div class="col-xs-6 col-sm-3">
                <div class="dcard">
                    <div class="row">
                        <div class="dcard-header">
                            <div class="dcard-body text-center" style="font-size: larger; color: white">
                                <span class="dcard-title ">{{$Book->bookname}}</span><br />
                                <span class="dcard-title ">{{$author_name}}</span><br />
                            </div>
                        <br/>
                            <div class="dcard-body text-center">
                                <img src="\image\book\pic\{{$Book->book_pic}}" alt="Pic" height="90" width="90"class="img-circle">
                            </div>
                         

                        </div>
                    </div>
                    <div class="dcard-body text-center">
                        <a class="btn btn-xs btn-primary" href="{{ route('patient.book.show',[$Book->id]) }}">
                            <i class="fa fa-eye"></i>
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