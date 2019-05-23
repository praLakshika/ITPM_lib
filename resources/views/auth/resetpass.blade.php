@extends('auth.layouts.auth')

@section('body_class','login')

@section('content')
    
<div class="flex-center position-ref ">
    <div class="top-left brand">
        <img src="img/art.png" alt="">
        <h1>Remember these </h1>
    </div>
</div>
<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    
            
            <div class="form-group">
                <label for="Email">Youre Email</label>
                <h2> {{ $resets->Email}}</h2>
             </div>
            <div class="form-group">
                <label for="Qt1">Question 1</label>
                <h3>{{$resets->Q1}}</h3>
                 </div>
                 <div class="form-group">
                        <label for="inputAddress">Answer for Question 1</label>
                        <h3>{{$resets->Q1A}}</h3>
                    </div>
            <div class="form-group">
                <label for="Qt2">Question 2</label>
                <h3>{{$resets->Q2}}</h3>
                 </div>
                 <div class="form-group">
                        <label for="inputAddress">Answer for Question 2</label>
                        <h3>{{$resets->Q2A}}</h3>
                     </div>
            <div class="form-group">
                    <label for="Qt3">Question 3</label>
                    <h3>{{$resets->Q3}}</h3>
                     </div>
                     <div class="form-group">
                            <label for="inputAddress">Answer for Question 3</label> 
                            <h3>{{$resets->Q3A}}</h3>
                         </div>
                         <form action="setpass" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
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