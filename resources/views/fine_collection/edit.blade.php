@extends('admin.layouts.admin')

@section('title',"Book fine fee Management") 

@section('content')
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
<form action="fine_feeupdate" method="post">
    {{ csrf_field() }}
    @if (!$errors->isEmpty())
        <div class="alert alert-danger" role="alert">
            {!! $errors->first() !!}
        </div>
    @endif
                            @php
                            use Illuminate\Support\Facades\DB;
                            use Carbon\Carbon;
                            $booksadd = DB::select('select * from book where id ='.$fee->bookcatid);
                            $bookname="panding";
                            $mytime = Carbon::now();
                            foreach($booksadd as $bookadd)
                            {
                                $bookname=$bookadd->bookname;
                            }
                           
                            @endphp
    @if(Session::has('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif
        <div class="form-group">
                <label for="name">Book name *</label>
                <h3>{{ $bookname }}</h3>
              </div>
              <div class="form-group">
                <label for="fee_per_day">Book fine fee *</label>
                <input type="text" class="form-control" name="fee_per_day" id="fee_per_day" value="{{ $fee->fee_per_day }}">
              </div>
        <input type="hidden" id="id" name="id" value="{{ $fee->id }}">
        <a href="{{ route('admin.fine_fee') }}" class="btn btn-danger">Cancel</a>
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