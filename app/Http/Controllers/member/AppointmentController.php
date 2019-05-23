<?php

namespace App\Http\Controllers\patient;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\Role\Role;
use DB;

use Carbon\Carbon;
use App\Models\Notification;
use Validator;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('patient.appointments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.appointments.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = [
            'name' => 'required|regex:/^[a-zA-Z0-9 ]+$/u|max:255',
            'type' => 'required',
            'date' => 'required|date_format:Y-m-d|after:today',
            'time' => 'required',
        ];

        $customMessages = [
            'name.regex' => 'Name cannot contain numbers and special characters',
            'date.after' => 'Appointment Date can not be today, tomorrow onward',
            'time.after' => 'Appointment Time cannot be now or past'
        ];
        $this->validate($request, $validatedData, $customMessages);
        $did=null;
        $lastid = 0;
        $appointments = DB::select('select * from appointments ORDER BY id DESC LIMIT 1');
        foreach($appointments as $appointment)
        {
            $lastid=$appointment->id;
            $did=$appointment->Did;
        }
        if($lastid==0)
         {
             $did="APP000";
         }
         $lastDid=substr($did,3);
         $lastDid=$lastDid+1;
         $lastDid=str_pad($lastDid,4,"0",STR_PAD_LEFT);
         $did="APP".$lastDid;
        if(\Auth::check()) {
        
            Appointment::create([
                'Did'=>$did,
                'name'=>$request->get('name'),
                'date'=>$request->get('date'),
                'time'=>$request->get('time'),
                'type'=>$request->get('type'),
                'applicant'=>\Auth::user()->id
                
            ]);
            
            //add notification to display on employees
            Notification::create([
                'user_type' => \Auth::user()->usertype,
                'user_id' => \Auth::user()->id,
                'message' => 'Appointment is requested by ' . \Auth::user()->name,
                'header' => 'New appointment Request',
                'status' => 'unread',
                'action' => 'pending',
                'date' => Carbon::now()->format('Y.m.d'),
                'time' => Carbon::now()->format('H.i')
            ]);
        }

        return redirect()->route('patient.appointments')->with('message', 'Appointment added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('patient.appointments.show', ['appointment' => $appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('patient.appointments.edit', ['appointment' => $appointment, 'roles' => Role::get()]);
    }
    public function checkDate(Request $request)
    {
        //check for duplicate
        $count = DB::table('appointments')->where('date', $request->date)->count();
        $allocateValidateMessage ='This day('.$request->date.') do not have available time slots to allocate, 
        please allocate another day! ';
        Validator::extend('checkDateSlot', function ($attribute, $value, $parameters, $validator) {
            return $parameters[0] !== "13";
        }, $allocateValidateMessage);

        $validatedData = [
            'date' => "required|date_format:Y-m-d|after:today|checkDateSlot:{$count}",
        ];

        $customMessages = [
            'date.after' => 'Appointment Date can not be today, tomorrow onward',
        ];

        $this->validate($request, $validatedData, $customMessages);

        $appointments = Appointment::where('date', $request->date)->pluck('time');
        return view('patient.appointments.add')->with(['message' => 13 - $count . 'time slots are available.', 'appointments' => $appointments]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        $appointment->name = $request->get('name');
        $appointment->type = $request->get('type');
        $appointment->date = $request->get('date');
        $appointment->time = $request->get('time');

        $appointment->save();

        $message = 'Successfully updated appointment named '.$appointment->name.' with id '.$appointment->id;
        return redirect()->intended(route('patient.appointments'))->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $message = 'Successfully deleted appointment named '.$appointment->name.' with id '.$appointment->id;
        $appointment->delete();
        return redirect()->route('patient.appointments')->with('message', $message);
    }
}
