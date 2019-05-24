@extends('admin.layouts.admin')

@section('title',"Add an fine fee") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="addbook_issue" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

        @if (!$errors->isEmpty())
            <div class="alert alert-danger" role="alert">
                {!! $errors->first() !!}
            </div>
        @endif
        @php
        use Illuminate\Support\Facades\DB;
        use Carbon\Carbon;
        $book_categorys = DB::select('select * from book_category');
       
       
        @endphp
        @if(Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif
        
        <div class="form-group">
            <label for="book_author">Book categorys *</label>
            <select name="book_author" class="form-control" >
                <option  disabled>Select one</option>
                @foreach($book_categorys as $book_category)
                    <option value={{$book_category->id}}>{{$book_category->book_category_name}}</option>
                @endforeach 
            </select>
        </div>
        
        <div class="form-group">
                <label for="book_quantity">Fine fee *</label>
                <input type="text" class="form-control" name="book_quantity" id="book_quantity" placeholder="Book quantity" value="{{ old('book_quantity') }}">
            </div>
        <a href="{{ route('admin.fine_fee') }}" class="btn btn-danger">Cancel</a>
        <a href="{{ route('admin.fine_fee.add') }}" class="btn btn-primary">Clear</a>
            
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