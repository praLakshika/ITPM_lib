@extends('admin.layouts.admin')

@section('content')
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            @section('title', "Book issue Management ")
        </div>
        <div class=".col-xs-6 .col-lg-4 searchbar-addbt">
            <div class="topicbar">
                {{-- <a href="{{ route('admin.employees.add') }}" class="btn btn-primary">Add Employee</a> --}}
                {{ link_to_route('admin.book_issue.add', 'Add Book issue', null, ['class' => 'btn btn-primary']) }}
            </div>
            <div class="right-searchbar">
                <!-- Search form -->
                <form action="searchbookissue" method="post" class="form-inline">
                        {{ csrf_field() }}
                         <div class="form-group">
                        <input class="form-control" type="text" name="key" placeholder="Search" aria-label="Search" value="{{isSet($key) ? $key : ''}}" />
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
                <th>Member name</th>
                <th>Book name</th>
                <th>Get date</th>
                <th>Book issued day</th>
                <th>Actions</th>
            </tr>
            </thead>
            @php
            use Illuminate\Support\Facades\DB;
            use Carbon\Carbon;
            @endphp
            <tbody>
               @foreach ($Book_issues as $Book_issue)
                    <tr>
                            @php
                            $booksadd = DB::select('select * from book where id ='.$Book_issue->book_id);
                            $members = DB::select('select * from member where id ='.$Book_issue->member_id);
                            $bookname="panding";
                            $mytime = Carbon::now();
                            foreach($booksadd as $bookadd)
                            {
                                $bookname=$bookadd->bookname;
                            }
                            $membername="panding";
                            foreach($members as $member)
                            {
                                $membername=$member->name;
                            }
                            @endphp
                        <td>{{ $Book_issue->id }}</td>
                        <td>{{  $membername }}</td>
                        <td>{{  $bookname }}</td>
                        <td>{{ $Book_issue->getdate }}</td>
                        <td>{{ $Book_issue->book_issued_day }}</td>
                        <td>
                            @if ( ($Book_issue->book_returned_day)==null)
                                
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.book_issue.show',[$Book_issue->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-info" href="{{  route('admin.book_issue.return',[$Book_issue->id]) }}">
                                    <i class="fas fa-undo"></i>
                                </a>
                            @else   
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.book_issue.show',[$Book_issue->id]) }}">
                                <i class="fa fa-eye"></i>
                            </a>

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