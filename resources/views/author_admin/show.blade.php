@extends('admin.layouts.admin')
@section('title', "Author Management")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                <th>Author Image</th>
                <td>
                        <img  id="myImg" onclick="displayIMG(this.id)" height="200" width="200" src="\image\author\pic\{{$Book_authors->pic}}" alt={{ $Book_authors->name }}>{{-- {{ $employee->avatar }} --}}
                        <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                          </div>
                        {{-- <img height="200" width="200" src="\image\service\item\{{$Services->pic}}" class="user-profile-image"></td> --}}
            </tr>
            
            <tr>
                <th>Author name</th>
                <td>{{ $Book_authors->name }}</td>
            </tr>
            
            <tr>
                <th>Author birthday</th>
                <td>{{ $Book_authors->birthday }}</td>
            </tr>
            
            <tr>
                <th>Author address</th>
                <td>{{ $Book_authors->address }}</td>
            </tr>
            
            <tr>
                <th>Author email</th>
                <td>{{ $Book_authors->email }}</td>
            </tr>
            
            <tr>
                <th>Author contact</th>
                <td>{{ $Book_authors->contact }}</td>
            </tr>
            </tbody>
        </table>
        <a href="{{ route('admin.author') }}" class="btn btn-danger">Online Book home</a>
        <a class="btn btn-info" href="{{ route('admin.author.edit',[$Book_authors->id]) }}">Edit</a>
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