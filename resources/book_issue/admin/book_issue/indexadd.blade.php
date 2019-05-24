@extends('admin.layouts.admin')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Book issue Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            
                <div class="right-searchbar">
                        <!-- Search form -->
                        <form action="book_issue_member" method="post" class="form-inline">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <input class="form-control" type="text" name="search" placeholder="Search member" aria-label="Search" required />
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
    use Carbon\Carbon;
    
    @endphp
    <div class="row">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="75%">
                    <thead> 
                    <tr>
                        <th>Member DID</th>
                        <th>Member name</th>
                        <th>Borrow count</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($members as $member)
                        <tr> 
                            @php
                                    $booksadd = DB::select('select COUNT(id) as count from book_issue where member_id='.$member->id.' and book_returned_day IS NULL' );
        
                                    foreach($booksadd as $bookadd)
                                     {
                                         $bookcount=$bookadd->count;
                                     }
                            @endphp
                            <td>{{ $member->id}} </td>
                            <td>{{ $member->name }}</td> 
                            <td>{{ $bookcount}} </td>
                            <td>
                                @if ($bookcount>=3)
                                    This member has borrowed 3 books
                                @else
                                <a class="btn btn-xs btn-info" href="{{ route('admin.book_issue.addbook',$member->id) }}">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                @endif
                                
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        <div class="pull-right">
        </div>
    </div>
@endsection