@extends('admin.layouts.admin')
@section('title', "Services Management")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
            

            <tr>
                <th>Patient Name</th>
                <td>{{ $Quotation->pronounced }}.{{ $Quotation->name }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $Quotation->address }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $Quotation->date }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $Quotation->address }}</td>
            </tr>
            <tr>
                <th>Divice</th>
                <td>{{ $Quotation->divice }}</td>
            </tr>
            <tr>
                <th>Diagnosis</th>
                <td>{{ $Quotation->diagnosis }}</td>
            </tr>
            <tr>
                <th>Prescription</th>
                <td>{{ $Quotation->prescription }}</td>
            </tr>
            <tr>
                <th>Warranty</th>
                <td>{{ $Quotation->warranty }}</td>
            </tr>
            <tr>
                <th>Delivery date</th>
                <td>{{ $Quotation->deliverydate }}</td>
            </tr>
            
            <tr>
                <th>Price</th>
                <td>{{ $Quotation->price }}</td>
            </tr>
            <tr>
                <th>Price validity</th>
                <td>{{ $Quotation->pricevalidity }}</td>
            </tr>
            <tr>
                <th>Payment method</th>
                <td>{{ $Quotation->paymentmethod }}</td>
            </tr>
            <tr>
                <th>Print</th>
                <td> 
                    <form action="printQuotation" method="post">
                            {{ csrf_field() }}
                        <input type="hidden" id="id" name="id" value="{{$Quotation->id}}">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
        <a href="{{ route('admin.quotation') }}" class="btn btn-danger">Quotation home</a>
        <a class="btn btn-info" href="{{ route('admin.quotation.edit',[$Quotation->id]) }}">Edit</a>
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