<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PdfReport;
use Carbon\Carbon;
use App\Models\Auth\Role\Role;
use App\Models\Auth\User\User;
use App\Models\Member;
use Ramsey\Uuid\Uuid;
use Validator;
use App;
use Barryvdh\DomPDF\Facade as PDF;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.member.index');
    }

    public function edit(Member $Member)
    {
        return view('member.member.edit',['Member' => $Member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
            $validatedData = [
              'name' => 'required|regex:/^[a-zA-Z .]+$/u|max:255',
              'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
              'address' => 'required'
          ];
          $customMessages = [
              'name.required' => 'Name is require',
              'contact.required' => 'Contact number is require',
              'address.required' => 'Address is require',
              'name.regex' => 'Name cannot contain numbers and special characters',
              'contact.regex' => 'Contact number is phone number'
          ];
          $this->validate($request, $validatedData, $customMessages);
        $members = DB::select('select * from member where id ='.$request['id']);
        foreach($members as $member)
        {
            $name=$member->name;
            $contact=$member->contact;
            $address=$member->address;
            
            if(($name==$request['name']) and ($contact==$request['contact']) and ($address==$request['address']) ) 
            {
            $message = 'Nothing to update';
            return redirect()->intended(route('patient.member.edit',[$request->id]))->with('message', $message);
            }
            
            else
            {
              DB::table('member')
              ->where('id', $request['id'])
              ->update(['name' => $request['name'],'contact' => $request['contact'],'address' => $request['address']]);
          
                $members = DB::table('users')->where('email', $request['email'])->get();

              if($name != $request['name'])
              {
                DB::table('users')
                ->where('email', $request['email'])
                ->update(['name' => $request['name']]);
            
              }
              return view('member.member.success');
            }
        }
    }
    
}
