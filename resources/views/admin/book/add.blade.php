@extends('admin.layouts.admin')

@section('title',"Add an Book") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addbook" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

        @if (!$errors->isEmpty())
            <div class="alert alert-danger" role="alert">
                {!! $errors->first() !!}
            </div>
        @endif
        @php
        use Illuminate\Support\Facades\DB;
        $book_authors = DB::select('select * from book_author ORDER BY name ASC');
        $book_categorys = DB::select('select * from book_category ORDER BY book_category_name ASC');
        
        @endphp
        @if(Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif

        <div class="form-group">
            <label for="book_name">Book Name *</label>
            <input type="text" class="form-control" name="book_name" id="book_name" placeholder="Name" value="{{ old('book_name') }}">
        </div>
        
        <div class="form-group">
            <label for="book_author">Author Name *</label>
            <select name="book_author" class="form-control" >
                <option  disabled>Select one</option>
                @foreach($book_authors as $book_author)
                    <option value={{$book_author->id}}>{{$book_author->name}}</option>
                @endforeach 
            </select>
        </div>

        <div class="form-group">
            <label for="book_year">Book published year *</label>
            <input type="text" class="form-control" name="book_year" id="book_year" placeholder="Book published year" value="{{ old('book_year') }}">
        </div>
        <div class="form-group">
            <label for="book_quantity">Book quantity *</label>
            <input type="text" class="form-control" name="book_quantity" id="book_quantity" placeholder="Book quantity" value="{{ old('book_quantity') }}">
        </div>
        <div class="form-group">
            <label for="book_image">Book picture *</label>
            <input type="file" class="form-control" name="book_image" id="book_image" >
        </div>
        <div class="form-group">
            <label for="fine_fee">Fine fee(per day) *</label>
            <input type="text" class="form-control" name="fine_fee" id="fine_fee" placeholder="Fine fee" value="{{ old('fine_fee') }}">
        </div>
        <div class="form-group">
            <label for="book_categorys">Book categorys *</label><br>
            @foreach($book_categorys as $book_category)
            <input type="checkbox"name="ids[]" value={{$book_category->id}} > <span style="font-size: 100%; " class="label label-primary">{{$book_category->book_category_name}}</span>
             @endforeach 
        </div>
        <a href="{{ route('admin.book') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.book.add') }}" class="btn btn-primary">Clear</a>
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