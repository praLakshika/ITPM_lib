@extends('member.layouts.member')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Online library Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            
            <div class="right-searchbar">
                    <!-- Search form -->
                    <form action="searchonlinelibrary" method="post" class="form-inline">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control" type="text" name="search" placeholder="Search Online library" aria-label="Search" required />
                        </div>
                        <br>
                       <br>
                        <div class="form-group">
                            <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                        </div>
                        {{-- <i class="fa fa-search" aria-hidden="true"></i> --}}
                    </form>
                </div>
           
        </div>
    </div>
    @php
    
    use Illuminate\Support\Facades\DB;
    @endphp
    <div class="row">
            @foreach($Online_librarys as $Online_library)

            @php
            $IDs = DB::table('book_author')->where('id', $Online_library->authorid)->get();
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
                                <div class="dcard-body text-center bg-primary" style="font-size: larger; color: white">
                                    <span class="dcard-title ">{{  $Online_library->bookname}}</span><br />
                                    <span class="dcard-title ">{{ $author_name }}</span><br />
                                </div>
                            <br/>
                            <div class="card bg-info text-white">
                                <div class="dcard-body text-center bg-info">
                                        <img src="\image\onlineBook\pic\{{ $Online_library->book_pic }}" alt="Pic" height="90" width="90"class="img-circle">
                                     </div>
                                {{-- <span class="card-img">{{ HTML::image('img/nickfrost.jpg', 'Pic') }}</span> --}}
    
                        <div class="dcard-body text-center">
                                <a class="btn btn-xs btn-primary" href="{{ route('patient.online_book.show',[$Online_library->id]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                   
                        </div>
                    </div>
                </div>
                    
                </div>
                </div>
            </div>
    <div class="col-xs-1 col-sm-1"></div>
                
            @endforeach
        <div class="pull-right">
        </div>
    </div>
@endsection