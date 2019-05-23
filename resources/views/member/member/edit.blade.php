@extends('member.layouts.member')

@section('title',"Edit a Member", "Member")

@section('content')
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <form action="editmember" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            @if(Session::has('message'))
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>

            </div>
            <div class="form-group">
                <label for="inputAddress">Member Name</label>
                <input type="text" name="name" class="form-control" id="inputAddress" value="{{ $Member->name }}" >
            </div>
            
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" name="contact" class="form-control" id="contact" value="{{ $Member->contact }}">
            </div>
            <div class="form-group">
                    <label for="address">Address *</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="10" >{{ $Member->address  }}</textarea>
                  </div>
            
                <input type="hidden" id="id" name="id" value="{{ $Member->id }}">
                <input type="hidden" id="email" name="email" value="{{ $Member->email }}">
                <a href="{{ route('patient.member') }}" class="btn btn-danger">Cancel</a>
                <a href="{{ route('patient.member.edit',[$Member->id])}}" class="btn btn-danger">Clear</a>
            
            <button type="submit" class="btn btn-primary">Edit</button>

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