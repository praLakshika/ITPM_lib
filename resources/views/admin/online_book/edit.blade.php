@extends('admin.layouts.admin')

@section('title',"Online Book Management") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updatebook" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if (!$errors->isEmpty())
        <div class="alert alert-danger" role="alert">
            {!! $errors->first() !!}
        </div>
    @endif
    
    @if(Session::has('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif
        <div class="form-group">
                <label for="name">Book Online name *</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $books->bookname }}">
              </div>
        <div class="form-group">
            <label for="book_image">Book Online picture *</label>
            <input type="file" class="form-control" name="book_image" id="book_image" >
        </div>
        <div class="form-group">
            <label for="book_PDF">Book Online PDF *</label>
            <input type="file" class="form-control" name="book_PDF" id="book_PDF" >
        </div>
        <input type="hidden" id="id" name="id" value="{{ $books->id }}">
        <a href="{{ route('admin.online_book') }}" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>
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