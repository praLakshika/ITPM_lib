@extends('auth.layouts.auth')

@section('body_class','login')

@section('content')
    
<div class="flex-center position-ref ">
    <div class="top-left brand">
        <img src="img/art.png" alt="">
        <h1>Set new password</h1>
    </div>
</div><div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    
    @if (!$errors->isEmpty())
        <div class="alert alert-danger" role="alert">
            {!! $errors->first() !!}
        </div>
    @endif 
    @if($message!=null)
        <div class="alert alert-danger">
            {{ $message}}</div>
    @endif
    <div class="form-group">
        <label for="Email">Youre Email</label>
        <h2> {{ $resets->Email}}</h2>
     </div>
     <form action="setnewpass" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="pass">New password</label>
            <input type="password" name="pass" class="form-control" id="pass"  required>
        </div>
        <div class="form-group">
            <label for="inputAddress">Confirm password</label>
            <input type="password" name="Cpass" class="form-control" id="Cpass"  required>
        </div>
        <input type="hidden" id="Email" name="Email" value="{{$resets->Email}}">
        <button type="submit" class="btn btn-success">Next </button>
                     
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