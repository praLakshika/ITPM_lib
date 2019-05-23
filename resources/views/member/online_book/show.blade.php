@extends('member.layouts.member')
@section('title', "Online Book Management")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                    @php
    
                    use Illuminate\Support\Facades\DB;
                    $email=auth()->user()->email;
                    $IDs = DB::table('book_author')->where('id', $bookonlines->authorid)->get();
                    $onlinebookcats = DB::table('onlinebookcat')->where('bookid', $bookonlines->id)->get();
                    
                    $author_name = "pandding";
                        foreach($IDs as $ID)
                        {
                            $author_name=$ID->name;
                            
                        }
                    @endphp
                <th>Book Image</th>
                <td>
                        <img  id="myImg" onclick="displayIMG(this.id)" height="200" width="200" src="\image\onlineBook\pic\{{$bookonlines->book_pic}}" alt={{ $bookonlines->bookname }}>{{-- {{ $employee->avatar }} --}}
                        <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                          </div>
                        {{-- <img height="200" width="200" src="\image\service\item\{{$Services->pic}}" class="user-profile-image"></td> --}}
            </tr>
            <tr>
                    <th>Book PDF doc</th>
                    <td><a class="fas fa-file-pdf-o" href="\image\onlineBook\pdf\{{$bookonlines->pdf_doc}}">Open the pdf!</a></td>
                </tr>
            <tr>
                <th>Book name</th>
                <td>{{ $bookonlines->bookname }}</td>
            </tr>

            <tr>
                    <th>Book author name</th>
                    <td>{{ $author_name }}</td>
                </tr>
            
            <tr>
                <th>Book published year</th>
                <td>
                    {{ ($bookonlines->book_published_year)}} 
                </td>
            </tr>
            <tr>
                <th>Book categorys</th>
                <td>
                    @foreach ($onlinebookcats as $onlinebookcat)
                    @php
                     $onlinebookcates = DB::table('book_category')->where('id', $onlinebookcat->book_cat_id)->get();
                    
                    @endphp
                     @foreach ($onlinebookcates as $onlinebookcate)
                     <span style="font-size: 100%; " class="label label-primary"> {{ ($onlinebookcate->book_category_name)}} </span>
                   
                    @endforeach
                    @endforeach
                </td>
            </tr>
            </tbody>
        </table>
        <a href="{{ route('patient.online_book') }}" class="btn btn-danger">Online Book home</a>
      </div>
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