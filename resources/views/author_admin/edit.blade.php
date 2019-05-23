@extends('admin.layouts.admin')

@section('title',"Author Management") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="updateauthor" method="post" enctype="multipart/form-data">
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
          <label for="name">Author name *</label>
          <input type="text" class="form-control" name="name" id="name" value="{{ $Book_authors->name }}">
        </div>
        <div class="form-group">
            <label for="email">Author email </label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ $Book_authors->email }}">
        </div>
        <div class="form-group">
            <label for="contact">Author contact </label>
            <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="{{ $Book_authors->contact }}">
        </div>
        <div class="form-group">
            <label for="author_address">Address *</label>
            <textarea class="form-control" name="author_address" id="author_address" cols="30" rows="10" placeholder="Address " >{{ $Book_authors->address }}</textarea>
        </div>
        <div class="form-group">
            <label for="author_image">Author picture *</label>
            <input type="file" class="form-control" name="author_image" id="author_image" >
        </div>
        <input type="hidden" id="id" name="id" value="{{ $Book_authors->id }}">
        <a href="{{ route('admin.author') }}" class="btn btn-danger">Cancel</a>
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