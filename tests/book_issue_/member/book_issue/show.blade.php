@extends('member.layouts.member')
@section('title', "Online Book Management")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
                    @php
                    use Illuminate\Support\Facades\DB;
                    use Carbon\Carbon;
                    $booksadd = DB::select('select * from book where id ='.$Book_issue->book_id);
                    $members = DB::select('select * from member where id ='.$Book_issue->member_id);
                    $bookname="panding";
                    $mytime = Carbon::now();
                    foreach($booksadd as $bookadd)
                    {
                        $bookname=$bookadd->bookname;
                    }
                    $membername="panding";
                    foreach($members as $member)
                    {
                        $membername=$member->name;
                    }
                    @endphp

<tr>
        <th>Book name</th>
        <td>{{ $bookname}}</td>
    </tr>

    <tr>
        <th>Member Name</th>
        <td>
             {{ $membername}}
        </td>
    </tr>

    <tr>
        <th>Book get date</th>
        <td>
            {{ $Book_issue->getdate  }}
        </td>
    </tr>
    <tr>
        <th>Book issued date</th>
        <td>
            {{ $Book_issue->book_issued_day  }}
        </td>
    </tr>
    <tr>
            <th>Book returned date</th>
            <td>
                {{ $Book_issue->book_returned_day  }}
            </td>
        </tr>

                  
            </tbody>
        </table>
        <a href="{{ route('patient.book_issue') }}" class="btn btn-danger">Book issue home</a>
        
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