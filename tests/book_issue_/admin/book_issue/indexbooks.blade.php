@extends('admin.layouts.admin')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Book issue Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
            
                <div class="right-searchbar">
                        <!-- Search form -->
                        <form action="book_issue_book" method="post" class="form-inline">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <input class="form-control" type="text" name="search" placeholder="Search book" aria-label="Search" required />
                            </div>
                            <br>
                            <br>
                            <input type="hidden" id="memberID" name="memberID" value="{{$id}}">
                            <div class="form-group">
                                <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                            </div>
                            {{-- <i class="fa fa-search" aria-hidden="true"></i> --}}
                        </form>
                    </div>
            
        </div>
    </div>
   
    <div class="row">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="75%">
                    <thead> 
                    <tr>
                        <th>Book ID</th>
                        <th>Book name</th>
                        <th>Book available</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Books as $Book)
                        <tr> 
                            <td>{{ $Book->id }}</td>
                            <td>{{ $Book->bookname}}</td> 
                            <td>{{ $Book->book_quantity_now}}</td> 
                            <td>
                                @if (($Book->book_quantity_now)<=0)
                                    Book is not available
                                @else
                                <form action="book_issue_add" method="post" class="form-inline">
                                        {{ csrf_field() }}
                            <input type="hidden" id="memberID" name="memberID" value="{{$id}}">
                            <input type="hidden" id="bookID" name="bookID" value="{{$Book->id}}">

                            <div class="form-group">
                                    <button class="btn btn-xs btn-info" style="margin-top: -10px;" type="submit"><i class="fa fa-plus"></i></button>
                                </div>
                               
                            </form>
                            
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