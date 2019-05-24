@extends('admin.layouts.admin')

@section('content')
    <div class="row title-section">
        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
            @section('title', "Book fine fee Management ")
        </div>
        <div class=".col-xs-6 .col-lg-4 searchbar-addbt">
           
            <div class="right-searchbar">
                <!-- Search form -->
                <form action="{{ route('admin.book_issue') }}" method="get" class="form-inline">
                    <div class="form-group">
                        <input class="form-control" type="text" name="key" placeholder="Search" aria-label="Search" value="{{isSet($key) ? $key : ''}}" />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                    </div>
                    {{-- <i class="fa fa-search" aria-hidden="true"></i> --}}
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
            <thead> 
            <tr>
                <th>ID</th>
                <th>Book name</th>
                <th>Find fee per day</th>
                <th>Actions</th>
            </tr>
            </thead>
            @php
            use Illuminate\Support\Facades\DB;
            use Carbon\Carbon;
            @endphp
            <tbody>
               @foreach ($Fine_fee  as $Fine_fe)
                    <tr>
                            @php
                            $booksadd = DB::select('select * from book where id ='.$Fine_fe->bookcatid);
                            $bookname="panding";
                            $mytime = Carbon::now();
                            foreach($booksadd as $bookadd)
                            {
                                $bookname=$bookadd->bookname;
                            }
                           
                            @endphp
                        <td>{{ $Fine_fe->id }}</td>
                        <td>{{  $bookname }}</td>
                        <td>Rs.{{ $Fine_fe->fee_per_day  }}.00</td>
                        <td>
                                    <a class="btn btn-xs btn-info" href="{{  route('admin.fine_fee.edit',[$Fine_fe->id]) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
        <div class="pull-right">
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style('assets/admin/css/my_style.css') }}
@endsection