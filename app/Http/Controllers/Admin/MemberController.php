<?php

namespace App\Http\Controllers\admin;

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
use DateTime;
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
        $members = Member::all();
        return view('admin.member.index', compact('members'));
    }
    public function searchMember(Request $request)
    {
        $members = DB::table('member')
        ->where('id', $request['search'])
        ->orWhere('name', 'like', '%' . $request['search'] . '%')
        ->get();
        return view('admin.member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Member $Member)
    {Validator::extend('olderThan', function($attribute, $value, $parameters)
        {
            $minAge = ( ! empty($parameters)) ? (int) $parameters[0] : 18;
            return (new DateTime)->diff(new DateTime($value))->y >= $minAge;
        
            // or the same using Carbon:
            // return Carbon\Carbon::now()->diff(new Carbon\Carbon($value))->y >= $minAge;
        });

        $validatedData = [
            'name' => 'required|regex:/^[a-zA-Z .]+$/u|max:255',
            'email' => 'required|email',
            'nic' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'birthday' => 'required|before:now|olderThan:18',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'mer_pic' => 'required|image'
        ];
        
        $customMessages = [
            'birthday.older_than'=> 'Age older than 18',
            'name.required' => 'Name is require',
            'mer_pic.required' => 'Member Picture is require',
            'contact.required' => 'Contact number is require',
            'nic.required' => 'NIC number is require',
            'address.required' => 'Address is require',
            'name.regex' => 'Name cannot contain numbers and special characters',
            'nic.regex' => 'NIC number can include only numbers',
            'contact.regex' => 'Contact number is phone number'
        ];

        $this->validate($request, $validatedData, $customMessages);
        $pic_name="panding";
        $file=$request ->file('mer_pic');

        $memberVals = DB::select('select * from member ORDER BY id DESC LIMIT 1');
        
        $type=$file->guessExtension();
        $lastid = 0;
        foreach($memberVals as $memberVal)
        {
            $lastid=$memberVal->id;
        }
        $lastid=$lastid+1;
        $pic_name=$lastid."member.".$type;
        $file->move('image/member/pic',$pic_name);

        $Member->name=$request->get('name');
        $Member->nic=$request->get('nic');
        $Member->mbr_pic=$pic_name;
        $Member->contact=$request->get('contact');
        $Member->email=$request->get('email');
        $Member->birthday=$request->get('birthday');
        $Member->address=$request->get('address');
        $Member->save();

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('nic')),
            'confirmation_code' => Uuid::uuid4(),
            'confirmed' => true,
            'usertype' => 'Patient'
            ]);

            // assign the role to a user role.
            $role = Role::findOrFail(2);
            $user->roles()->attach($role);
        return view('admin.member.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show(Member $Member)
    {
        // $file='art.PNG';
        // $filename= public_path().'/img/'.$file;
        // File::delete($filename);
        return view('admin.member.show',['Member' => $Member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $Member)
    {
        return view('admin.member.edit',['Member' => $Member]);
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
            $email=$member->email;
            if(($name==$request['name']) and ($contact==$request['contact']) and ($address==$request['address']) ) 
            {
            $message = 'Nothing to update';
            return redirect()->intended(route('admin.member.edit',[$request->id]))->with('message', $message);
            }
            else
            {
                if($name != $request['name'])
                {
                  DB::table('users')
                  ->where('email', $email)
                  ->update(['name' => $request['name']]);
              
                }
              DB::table('member')
              ->where('id', $request['id'])
              ->update(['name' => $request['name'],'contact' => $request['contact'],'address' => $request['address']]);
          
              return view('admin.member.success');
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        return view('admin.member.delete',['member' => $member]);
    }
    public function sedelete(Request $request)//Request $request, Employee $employee
    {
        DB::table('member')->where('id', $request['id'])->delete();
         return view('admin.member.success');
    }
}
