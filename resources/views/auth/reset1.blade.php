@extends('auth.layouts.auth')

@section('body_class','login')

@section('content')
    
<div class="flex-center position-ref ">
    <div class="top-left brand">
        <img src="img/art.png" alt="">
        <h1>Set new password</h1>
    </div>
</div>
                @php
                
                use Illuminate\Support\Facades\DB;
                $Q1='no';
                $Q2='no';
                $Q3='no';
                $Q4='no';
                $Q5='no';
                $Q6='no';
                $Q7='no';
                $Q8='no';
                $Q9='no';
                $emailu="no";
                $questions=DB::select("select * from resetquestion");
                foreach ($questions as $question)
                {
                if($question->id==1)
                {
                    $Q1=$question->Question;
                }
                if($question->id==2)
                {
                    $Q2=$question->Question;
                }if($question->id==3)
                {
                    $Q3=$question->Question;
                }if($question->id==4)
                {
                    $Q4=$question->Question;
                }if($question->id==5)
                {
                    $Q5=$question->Question;
                }if($question->id==6)
                {
                    $Q6=$question->Question;
                }if($question->id==7)
                {
                    $Q7=$question->Question;
                }
                if($question->id==8)
                {
                    $Q8=$question->Question;
                }
                if($question->id==9)
                {
                    $Q9=$question->Question;
                }
                }@endphp
                
                
                       <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <form action="setreset" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                                @if (!$errors->isEmpty())
                                    <div class="alert alert-danger" role="alert">
                                        {!! $errors->first() !!}
                                    </div>
                                @endif
                                @if(Session::has('message'))
                                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="Email">Youre Email</label>
                                    <h2> @foreach($users as $user)
                                        {{ $emailu=$user->email}}
                                         @endforeach</h2>
                                 </div>
                                <div class="form-group">
                                    <label for="Qt1">Question 1</label>
                                    <select name="Qt1" class="form-control" required>
                                            <option disabled selected value >Select Question</option>
                                            <option value="{{$Q1}}">{{$Q1}}</option>
                                            <option value="{{$Q2}}">{{$Q2}}</option>
                                            <option value="{{$Q3}}">{{$Q3}}</option>
                                        </select>
                                     </div>
                                     <div class="form-group">
                                            <label for="inputAddress">Answer for Question 1</label>
                                            <input type="text" name="ANS1" class="form-control" id="ANS1"  required>
                                        </div>
                                <div class="form-group">
                                    <label for="Qt2">Question 2</label>
                                    <select name="Qt2" class="form-control" required >
                                            <option disabled selected value >Select Question</option>
                                            <option value="{{$Q4}}">{{$Q4}}</option>
                                            <option value="{{$Q5}}">{{$Q5}}</option>
                                            <option value="{{$Q6}}">{{$Q6}}</option>
                                        </select>
                                     </div>
                                     <div class="form-group">
                                            <label for="inputAddress">Answer for Question 2</label>
                                            <input type="text" name="ANS2" class="form-control" id="ANS2" required >
                                         </div>
                                <div class="form-group">
                                        <label for="Qt3">Question 3</label>
                                        <select name="Qt3" class="form-control" required>
                                                <option  disabled selected value >Select Question</option>
                                                <option value="{{$Q7}}">{{$Q7}}</option>
                                                <option value="{{$Q8}}">{{$Q8}}</option>
                                                <option value="{{$Q9}}">{{$Q9}}</option>
                                            </select>
                                         </div>
                                         <div class="form-group">
                                                <label for="inputAddress">Answer for Question 3</label>
                                                <input type="text" name="ANS3" class="form-control" id="ANS3"  required>
                                             </div>
                                             <input type="hidden" id="Email" name="Email" value="{{$emailu}}">
                                 <button type="submit" class="btn btn-primary">Add</button>
                              </form>
                            </div>
                            </div>
                        @endsection
                        
                        @section('styles')
                            @parent
                            {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
                        @endsection
                        
                        @section('scripts')
                            @parent
                            {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
                        @endsection