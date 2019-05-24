@extends('admin.layouts.admin')

@section('title',"Add a book category", "Diagnosis") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addbook_category" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
        @if(Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
        @if (!$errors->isEmpty())
            <div class="alert alert-danger" role="alert">
                {!! $errors->first() !!}
            </div>
        @endif
   
        <div class="form-group">
            <label for="book_category_name">Book category Name *</label>
            <input type="text" class="form-control" name="book_category_name" id="book_category_name" placeholder="Book category Name" value="{{ old('book_category_name') }}">
        </div> 
       
       
        <a href="{{ route('admin.book') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.book_category.add') }}" class="btn btn-primary">Clear</a>
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