@extends('admin.layouts.admin')
@section('content')
    <div class="row title-section">
        <div class="col-12 col-md-8">
        @section('title', "Diagnosis Management")
        </div>
        <div class="col-8 col-md-4" style="padding-bottom: 15px;">
                <div class="right-searchbar">
                        <!-- Search form -->
                        <form action="searchpationdiagnosis" method="post" class="form-inline">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <input class="form-control" type="text" name="search" placeholder="Search Patient" aria-label="Search" required />
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-primary" style="margin-top: -10px;" type="submit">Search</button>
                            </div>
                            {{-- <i class="fa fa-search" aria-hidden="true"></i> --}}
                        </form>
                    </div>
            
        </div>
    </div>
    <div class="row">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="75%">
                    <thead> 
                    <tr>
                        <th>Patient DID</th>
                        <th>Patient name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($patients as $patient)
                        <tr> 
                            <td>{{ $patient->Did }}</td>
                            <td>{{ $patient->name }}</td> 
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.diagnosis.add',$patient->id) }}">
                                    <i class="fa fa-plus"></i>
                                </a>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        <div class="pull-right">
        </div>
    </div>
@endsection