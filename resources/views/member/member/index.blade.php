@extends('member.layouts.member')
@section('title', "Book Management")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            <tr>
                @php
    
                use Illuminate\Support\Facades\DB;
                $email=auth()->user()->email;
                $members = DB::table('member')->where('email', $email)->get();
                $mbr_pic = "pandding";
                $address = "pandding";
                $birthday = "pandding";
                $contact = "pandding";
                $email = "pandding";
                $nic = "pandding";
                $name = "pandding";
                $id = "pandding";
                
                    foreach($members as $member)
                    {
                        $mbr_pic=$member->mbr_pic;
                        $address=$member->address;
                        $birthday=$member->birthday;
                        $contact=$member->contact;
                        $email=$member->email;
                        $nic=$member->nic;
                        $name=$member->name;
                        $id=$member->id;
                        $name=$member->name;
                    }
                @endphp
                <th>Member Image</th>
                <td>
                        <img  id="myImg" onclick="displayIMG(this.id)" height="200" width="200" src="\image\member\pic\{{$mbr_pic}}" alt={{ $name }}>{{-- {{ $employee->avatar }} --}}
                        <div id="myModal" class="modal">
                                <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                          </div>
                        {{-- <img height="200" width="200" src="\image\service\item\{{$Services->pic}}" class="user-profile-image"></td> --}}
            </tr>

            <tr>
                <th>Member name</th>
                <td>{{ $name }}</td>
            </tr>

            <tr>
                    <th>Member nic</th>
                    <td>{{ $nic }}</td>
                </tr>
            <tr>
                    <th>Member email</th>
                    <td>{{ $email }}</td>
                </tr>
            <tr>
                <th>Member contact</th>
                <td>
                        {{ $contact }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>Member birthday</th>
                <td>
                    {{ ($birthday)}} 
                </td>
            </tr>
            <tr>
                <th>Member address</th>
                <td>
                    {{ ($address)}} 
                </td>
            </tr>
            </tbody>
        </table>
        <a class="btn btn-info" href="{{ route('patient.member.edit',[$id]) }}">Edit my details</a>
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