@extends('auth.layouts.auth')

@section('body_class','login')

@section('content')
    
<div class="flex-center position-ref ">
    <div class="top-left brand">
        <img src="img/art.png" alt="">
        <h1>Reset password </h1>
    </div>
</div>

<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        @if(!empty($message))
        <div class="panel panel-danger">
        
                {{-- <div class="panel-body"><p style="text-align:center;"><img src="img/core-img/artificial.png" class="center" width="800" height="420"></p></div> --}}
                <div class="panel-heading"> <div class="col-12 col-lg-5">{{ $message}}</div>
                <div  align="right"> .</a></div>
            </div>
            </div>
            @endif
            @foreach ($reset as $resets)
                @php
                    $Email=$resets->Email;
                    $Q1=$resets->Q1;
                    $Q1A=$resets->Q1A;
                    $Q2=$resets->Q2;
                    $Q2A=$resets->Q2A;
                    $Q3=$resets->Q3;
                    $Q3A=$resets->Q3A;
                @endphp
            @endforeach
            <form action="restnewpass" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Email">Youre Email</label>
                <h2> {{ $Email}}</h2>
             </div>
             
            <div class="form-group">
                <label for="Qt1">Question 1</label>
                <h3>{{$Q1}}</h3>
                 </div>
                 <div class="form-group">
                        <label for="inputAddress">Answer for Question 1</label>
                        <input type="text" name="ANS1" class="form-control" id="ANS1" value="{{ old('ANS1') }}"  required>
                    </div>
            <div class="form-group">
                <label for="Qt2">Question 2</label>
                <h3>{{$Q2}}</h3>
                 </div>
                 <div class="form-group">
                        <label for="inputAddress">Answer for Question 2</label>
                        <input type="text" name="ANS2" class="form-control" id="ANS2" value="{{ old('ANS2') }}"  required >
                     </div>
            <div class="form-group">
                    <label for="Qt3">Question 3</label>
                    <h3>{{$Q3}}</h3>
                     </div>
                     <div class="form-group">
                            <label for="inputAddress">Answer for Question 3</label>
                            <input type="text" name="ANS3" class="form-control" id="ANS3" value="{{ old('ANS3') }}" required>
                         </div>
                         
                            {{ csrf_field() }}
                            <input type="hidden" id="Email" name="Email" value="{{$Email}}">
                            
                            <button type="submit" class="btn btn-success">Submit </button>
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