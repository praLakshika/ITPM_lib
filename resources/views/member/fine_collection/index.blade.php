@extends('member.layouts.member')

@section('content')
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            @section('title', "Book fine fee Management ")
        </div>
        <div class=".col-xs-6 .col-lg-4 searchbar-addbt">
                
            <div class="right-searchbar">
                <!-- Search form -->
                <form action="Msearchfine" method="post" class="form-inline">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <input class="form-control" type="text" name="key" required placeholder="Search" aria-label="Search" value="{{isSet($key) ? $key : ''}}" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                    </div>
                    {{-- <i class="fa fa-search" aria-hidden="true"></i> --}}
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
            <thead> 
            <tr>
                <th>ID</th>
                <th>Book name</th>
                <th>Member</th>
                <th>find fee</th>
            </tr>
            </thead>
            @php
            use Illuminate\Support\Facades\DB;
            use Carbon\Carbon;
            @endphp
            <tbody>
                    @foreach($Book_fine_collection as $Book_fine_collectio)
                    <tr>
                            @php
                            $email=auth()->user()->email;
                            $members = DB::table('member')->where('email', $email)->get();
      
                            $book_issues = DB::select('select * from book_issue where id ='.$Book_fine_collectio->book_issued_id);
                            $bookname="panding";
                            $membername=null;
                            $mytime = Carbon::now();
                            foreach($book_issues as $book_issue)
                            {
                                $bookname=$book_issue->book_id;
                                $membername=$book_issue->member_id;
                            }
                            $booknames = DB::select('select * from book where id ='.$bookname);
                            
                            foreach($members as $member)
                            {
                                $membername=$member->name;
                            }
                            foreach($booknames as $booknam)
                            {
                                $bookname=$booknam->bookname;
                                // $bookid=$bookname->id;
                            }
                            @endphp
                            @if ( $membername!=null)
                            <td>{{ $Book_fine_collectio->id }}</td>
                            <td>{{  $bookname }}</td>
                            <td>{{ $membername}}</td>
                            <td>Rs. {{ $Book_fine_collectio->find_fee }}.00</td>    
                            @endif
                        
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
        <div class="pull-right">
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style('assets/admin/css/my_style.css') }}
@endsection