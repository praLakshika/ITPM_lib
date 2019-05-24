@extends('admin.layouts.admin')

@section('title',"Book issue Management") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="returnbook" method="post">
    {{ csrf_field() }}
    @if (!$errors->isEmpty())
        <div class="alert alert-danger" role="alert">
            {!! $errors->first() !!}
        </div>
    @endif
    @php
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    $booksadd = DB::select('select * from book where id ='.$books->book_id);
    $members = DB::select('select * from member where id ='.$books->member_id);
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
        <input type="hidden" id="id" name="id" value="{{ $books->id }}">
        <input type="hidden" id="return" name="return" value="{{ $mytime->toDateString() }}">
        
        <a href="{{ route('admin.book_issue') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary">Return</button>
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