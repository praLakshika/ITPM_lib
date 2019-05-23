@extends('admin.layouts.admin')
@section('title', "Book Management")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                    @php
    
                    use Illuminate\Support\Facades\DB;
                    $email=auth()->user()->email;
                    //$IDs = DB::table('book_author')->where('id', $books->authorid)->get();
                    $author_name = "pandding";
                        // foreach($IDs as $ID)
                        // {
                        //     $author_name=$ID->name;
                            
                        // }
                    @endphp
                <th>Member Image</th>
                <td>
                        <img  id="myImg" onclick="displayIMG(this.id)" height="200" width="200" src="\image\member\pic\{{$Member->mbr_pic}}" alt={{ $Member->name }}>{{-- {{ $employee->avatar }} --}}
                        <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                          </div>
                        {{-- <img height="200" width="200" src="\image\service\item\{{$Services->pic}}" class="user-profile-image"></td> --}}
            </tr>

            <tr>
                <th>Member name</th>
                <td>{{ $Member->name }}</td>
            </tr>

            <tr>
                    <th>Member nic</th>
                    <td>{{ $Member->nic }}</td>
                </tr>
            <tr>
                    <th>Member email</th>
                    <td>{{ $Member->email }}</td>
                </tr>
            <tr>
                <th>Member contact</th>
                <td>
                        {{ $Member->contact }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>Member birthday</th>
                <td>
                    {{ ($Member->birthday)}} 
                </td>
            </tr>
            <tr>
                <th>Member address</th>
                <td>
                    {{ ($Member->address)}} 
                </td>
            </tr>
            </tbody>
        </table>
        <a href="{{ route('admin.member') }}" class="btn btn-danger">Member home</a>
        <a class="btn btn-info" href="{{ route('admin.member.edit',[$Member->id]) }}">Edit</a>
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