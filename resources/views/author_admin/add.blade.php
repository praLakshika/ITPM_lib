@extends('admin.layouts.admin')

@section('title',"Add a author", "Diagnosis") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addauthor" method="post" enctype="multipart/form-data">
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
            <label for="author_name">Author Name *</label>
            <input type="text" class="form-control" name="author_name" id="author_name" placeholder="Name" value="{{ old('author_name') }}">
        </div>
        
        <div class="container">
            <div class="form-group">
                {!! Form::label('birthday', 'Birthday (not required)') !!}
                {!! Form::date('birthday', null, ['class'=> 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="email">Author email (not required)</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="contact">Author contact (not required)</label>
            <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="{{ old('contact') }}">
        </div>
        <div class="form-group">
            <label for="author_image">Author Image *</label>
            <input type="file" class="form-control" name="author_image" id="author_image" >
        </div>
        <div class="form-group">
            <label for="author_address">Address *</label>
            <textarea class="form-control" name="author_address" id="author_address" cols="30" rows="10" placeholder="Address " >{{ old('author_address') }}</textarea>
        </div>
        
        <a href="{{ route('admin.author') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.author.add') }}" class="btn btn-primary">Clear</a>
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