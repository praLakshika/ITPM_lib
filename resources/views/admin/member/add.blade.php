@extends('admin.layouts.admin')

@section('title',"Add a Member", "Member")

@section('content')
    <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <form action="addmember" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
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
                <input type="text" name="name" class="form-control" id="inputAddress" value="{{ old('name') }}" placeholder="Full Name">
            </div>
            <div class="form-group">
                <label for="inputAddress">E-Mail</label>
                <input type="text" name="email" class="form-control" id="inputAddress" value="{{ old('email') }}" placeholder="Valid Email Address">
            </div>
            <div class="form-group">
                <label for="inputAddress">Nic (without 'V')</label>
                <input type="text" name="nic" class="form-control" id="inputAddress" value="{{ old('nic') }}" placeholder="xxxxxxxxxx ">
            </div>
            <div class="container">
                <div class="form-group">
                    {!! Form::label('birthday', 'Birthday') !!}
                    {!! Form::date('birthday', null, ['class'=> 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" name="contact" class="form-control" id="contact" value="{{ old('contact') }}" placeholder="Valid contact Number">
            </div>
            <div class="form-group">
                    <label for="address">Address *</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="10" placeholder="Member Address">{{ old('address') }}</textarea>
                  </div>
            <div class="form-group">
                <label for="mer_pic">Member Picture</label>
                <input type="file" class="form-control" name="mer_pic" id="mer_pic" >
            </div>
            
            <button type="reset" class="btn btn-primary">Clear</button>
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