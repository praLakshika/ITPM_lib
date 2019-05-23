@extends('layouts.welcome')
@section('navigation')
<nav class="navbar navbar-inverse">
                
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand active" href="{{ url('/') }}">ARD book renting</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="{{ url('/') }}">{{ __('views.welcome.home') }}</a></li>
      <li ><a href="{{ url('/aboutus') }}">About Us</a></li>
      <li class="active"> <a href="{{ url('/services') }}">Services</a></li>
      <li >  <a href="{{ url('/contact') }}">Contact</a></li>
      
     
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
            @if (Route::has('login'))
            @if (!Auth::check())
                @if(config('auth.users.registration'))
                    {{-- <a href="{{ url('/register') }}">{{ __('views.welcome.register') }}</a> --}}
                @endif
                <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
<div class="container">
        <div class="well" style="background-image: url(img/bg-img/rsz_1hero2.jpg);">
            <!-- Title -->
            <h2 >Services of book renting</h2>
          </div>
         </div>
         
        <div class="container">
            <br>
            <div class="col-12 panel panel-primary">
                        
                {{-- <div class="panel-body"><p style="text-align:center;"><img src="img/core-img/artificial.png" class="center" width="800" height="420"></p></div> --}}
                <div class="panel-heading"><p style="text-align:center;"> <img src="img/icons/library.png" width="75px" height="75px"></p><h4 align="center">Books</h4>
            </div>
            </div>
            @php
    
            use Illuminate\Support\Facades\DB;
            @endphp
            @foreach($Books as $Book)
            @php
                $IDs = DB::table('book_author')->where('id', $Book->authorid)->get();
                $author_name = "pandding";
                        foreach($IDs as $ID)
                        {
                            $author_name=$ID->name;
                            
                        }
                
                @endphp
              <div class="col-12 col-sm-4 col-md-3 col-lg-3 text-center">
                <div class="panel panel-success ">
                    <div class="panel-heading " style="text-align: justify;">
                            <p style="text-align:center;"> 
                               <img class="imgdis" id={{ $Book->id }} onclick="displayIMG(this.id)"  src="\image\book\pic\{{$Book->book_pic}}" alt="Snow" style="height:200px;width:150px;max-width:200px"></p>
                            <h4 align="center">{{ $Book->bookname }}</h4></div>
                      <p >{{ $author_name }}</p>
                </div>
              </div>
             
              @endforeach 
              </div>
                                            <div class="container">
                                            <div id="myModal" class="modal">
                                                    <span class="close" style="color:#FB0233;font-weight:bold;font-size: 50px;">&times;</span>
                                                    <img class="modal-content" id="img01" width="100%" height="100%">
                                                  
                                                </div>
                                            </div>
            <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
                  </div>
                                                <div class="container">
                                                    <div class="panel panel-danger">
                        
                                                        {{-- <div class="panel-body"><p style="text-align:center;"><img src="img/core-img/artificial.png" class="center" width="800" height="420"></p></div> --}}
                                                        <div class="panel-heading"> <div class="col-12 col-lg-5">|| Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  by ARD book renting.<br></div>
                                                        <div  align="right"> Web Design by<a href="https://www.facebook.com/team176sri/" target="_blank">Team 176</a></div>
                                                    </div>
                                                  </div></div>
                                                  <script>
                                                        // Get the modal
                                                        var modal = document.getElementById('myModal');
                                                        // var img=document.getElementById("myImg");
                                                        var modalImg = document.getElementById("img01");
                                                        var captionText = document.getElementById("caption");
                                                       
                                                          function displayIMG(clicked_id)
                                                        {
                                                            modal.style.display = "block";
                                                            modalImg.src = document.getElementById(clicked_id).src;
                                                            captionText.innerHTML =document.getElementById(clicked_id).alt;
                                                        }  
                                                        
                                                        // Get the <span> element that closes the modal
                                                        var span = document.getElementsByClassName("close")[0];
                                                        
                                                        // When the user clicks on <span> (x), close the modal
                                                        span.onclick = function() { 
                                                            modal.style.display = "none";
                                                        }
                                                        </script>
                                                                                              
                                                
                  
@endsection