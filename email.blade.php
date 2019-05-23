@extends('layouts.welcome')
@section('navigation')
<nav class="navbar navbar-inverse">
                
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand active" href="{{ url('/') }}">Artificiallimbcare.lk</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="{{ url('/') }}">{{ __('views.welcome.home') }}</a></li>
      <li ><a href="{{ url('/aboutus') }}">About Us</a></li>
      <li > <a href="{{ url('/services') }}">Services</a></li>
      <li >  <a href="{{ url('/contact') }}">Contact</a></li>
      
     
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
          @if (Route::has('login'))
          @if (!Auth::check())
              @if(config('auth.users.registration'))
                  {{-- <a href="{{ url('/register') }}">{{ __('views.welcome.register') }}</a> --}}
              @endif
              <li class="active"><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          @else
              @if(auth()->user()->usertype == 'administrator'){{--->hasRole('administrator')--}}
              <li> <a href="{{ url('/admin') }}">{{ __('views.welcome.admin') }}</a></li>
              @elseif(auth()->user()->usertype == 'Receptionist')
              <li> <a href="{{ url('/receptionist') }}">{{ __('views.welcome.admin') }}</a></li>
              @elseif(auth()->user()->usertype == 'PNO')
              <li>  <a href="{{ url('/pno') }}">{{ __('views.welcome.admin') }}</a></li>
              @elseif(auth()->user()->usertype == 'Director')
              <li>  <a href="{{ url('/director') }}">{{ __('views.welcome.admin') }}</a></li>
              @elseif(auth()->user()->usertype == 'Patient')
              <li>  <a href="{{ url('/patient') }}">{{ __('views.welcome.admin') }}</a></li>
              @elseif(auth()->user()->usertype == 'Doctor')
              <li>  <a href="{{ url('/doctor') }}">{{ __('views.welcome.admin') }}</a></li>
              @endif
              <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span>{{ __('views.welcome.logout') }}</a></li>
          @endif
      @endif
      
    </ul>
  </div>
</nav>
@endsection
@section('content')
   
        
        <div  role="alert">
               
                <div class="panel-body">
                        <div class="container">
                            
                                @if(!empty($message))
                                <div class="panel panel-danger">
                        
                                        {{-- <div class="panel-body"><p style="text-align:center;"><img src="img/core-img/artificial.png" class="center" width="800" height="420"></p></div> --}}
                                        <div class="panel-heading"> <div class="col-12 col-lg-5">{{ $message}}</div>
                                        <div  align="right"> .</a></div>
                                    </div>
                                    </div>
                                    @endif
                            <div class="row ">
                                    
                                    <div class="col-xs-12 col-sm-12 col-lg-4  ">
                                            <div class="panel panel-warning">
                                                    <div class="panel-heading ">
                                <p style="text-align:center;"><img src="\img\core-img\artificial.png" class="center" width="350" height="350"></p></div>
                                            </div></div>  
                                <div class="col-xs-12 col-sm-12 col-lg-8">
                                        <div class="panel panel-primary">
                                                <div class="panel-heading ">
                                <h2>Reset password form</h2>
                                {{ Form::open(['route' => 'resetpass']) }}
                                  <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="{{ __('views.auth.login.input_0') }}" required autofocus>
                                </div>
                                  
                                  @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>

                        @endif

                        @if (!$errors->isEmpty())
                            <div class="alert alert-danger" role="alert">
                                {!! $errors->first() !!}
                            </div>
                        @endif
                        <button class="btn btn-default submit" type="submit">check email</button>
                       
                        {{ Form::close() }}
                              </div></div>
                                    </div>
                            </div></div>
                            <br>
                <br><br><br><br>
                            <div class="panel panel-danger">
                        
                                    {{-- <div class="panel-body"><p style="text-align:center;"><img src="img/core-img/artificial.png" class="center" width="800" height="420"></p></div> --}}
                                    <div class="panel-heading"> <div class="col-12 col-lg-5">|| Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  by ALC(pvt) Ltd.<br></div>
                                    <div  align="right"> Web Design by<a href="https://www.facebook.com/team176sri/" target="_blank">Team 176</a></div>
                                </div>
                                </div>
                                    
                                    
                                            
                                
    
@endsection

@section('styles')
    @parent

    {{ Html::style(mix('assets/auth/css/login.css')) }}
@endsection