@extends('admin.layouts.admin')

@section('title',"Add an book issue") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addbook_issue" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

        @if (!$errors->isEmpty())
            <div class="alert alert-danger" role="alert">
                {!! $errors->first() !!}
            </div>
        @endif
        @if(Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
        @php
        use Illuminate\Support\Facades\DB;
        use Carbon\Carbon;
        $booksadd = DB::select('select * from book where id ='.$Books);
        $members = DB::select('select * from member where id ='.$id);
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
       
        
          
        <div class="form-group">
            <label for="book_name">Book Name *</label>
            <h3>{{$bookname}}</h3>
        </div>
        <div class="form-group">
            <label for="book_name">Member Name *</label>
            <h3>{{$membername}}</h3>
        </div>
        <div class="form-group">
            <label for="book_name">Get date *</label>
            <h4> {{$mytime->toDateString()}}</h4>
        </div>
        <div class="form-group">
            <label for="book_issued_day">Due day of the borrowed book *</label>
            <input type="date" class="form-control" name="book_issued_day" id="book_issued_day" >
        </div>
        
        <input type="hidden" id="memberID" name="memberID" value="{{$id}}">
        <input type="hidden" id="bookID" name="bookID" value="{{$Books}}">
        <input type="hidden" id="getdate" name="getdate" value="{{$mytime->toDateString()}}">
       
        <a href="{{ route('admin.book_issue') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary">Add</button>
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