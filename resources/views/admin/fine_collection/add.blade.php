@extends('admin.layouts.admin')

@section('title',"Book fine fee Management") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="book_fine_collection" method="post">
    {{ csrf_field() }}
    @if (!$errors->isEmpty())
        <div class="alert alert-danger" role="alert">
            {!! $errors->first() !!}
        </div>
    @endif
    @php
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    $book_issues = DB::select('select * from book_issue where id ='.$idBookI);
    
    $bookname="panding";
    $membername="panding";
    $bookid=null;
    $fee_per_day="panding";
    $mytime = Carbon::now();
    // return $book_issues;
    foreach($book_issues as $book_issue)
    {
        $bookname=$book_issue->book_id;
        $membername=$book_issue->member_id;
    }
    
    $members = DB::select('select * from member where id ='.$membername);
    $booknames = DB::select('select * from book where id ='.$bookname);
    
    foreach($members as $member)
    {
        $membername=$member->name;
    }
    foreach($booknames as $booknam)
    {
        $bookname=$booknam->bookname;
        $bookid=$booknam->id;
        // $bookid=$bookname->id;
    }
    
    $bookfees = DB::select('select * from fine_fee where id ='.$bookid);
    $fine_fee_id=null;
    foreach($bookfees as $bookfee)
    {
        $fee_per_day=$bookfee->fee_per_day;
        $fine_fee_id=$bookfee->id;
    }
        $fee=$fee_per_day*$length;
    @endphp
    @if(Session::has('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif
    <div class="form-group">
            <label for="book_name">Book Name *</label>
            <h3>{{$bookname}}</h3>
        </div>
        <div class="form-group">
            <label for="book_name">Member Name *</label>
            <h3>{{$membername}}</h3>
        </div>
        <div class="form-group">
            <label for="book_year">Book return date *</label>
        <h3>{{$mytime->toDateString()}}</h3>
        </div>
        <div class="form-group">
        <label for="book_name">Book fine fee *</label>
        <h3>Rs. {{$fee}}.00</h3>
    </div>
        <input type="hidden" id="delayed_days" name="delayed_days" value="{{ $length }}">
        <input type="hidden" id="fine_fee_id" name="fine_fee_id" value="{{ $fine_fee_id }}">
        <input type="hidden" id="book_issued_id" name="book_issued_id" value="{{ $idBookI }}">
        <input type="hidden" id="find_fee" name="find_fee" value="{{ $fee }}">
        
        <button type="submit" class="btn btn-primary">Add Book fine collection</button>
      </form>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection