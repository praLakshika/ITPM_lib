<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

use App\Models\Reset;
use Illuminate\Support\Facades\DB;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkResponse($response)
    {
        return back()->with('status', __($response));
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email' => __($response)]
        );
    }

    public function resetpass(Request $request){
        $request->get('email');
        $reset=null;
        $reset = DB::table('reset')
        ->where('Email', $request['email'])
        ->get();
        
        
        if (count($reset)==0)
        {
            $message="You don't register our system";
            return view('auth.passwords.email')->with('message', $message);
        }
        return view('auth.passwords.resetquestion',compact('reset'));
        // return view('admin.services.index', compact('reset'));
    }
    public function restnewpass(Request $request,Reset $resets){
        $reset=null;
        $reset = DB::table('reset')
        ->where('Email', $request['Email'])
        ->get();
        $Email=null;
        $Q1=null;
        $Q1A=null;
        $Q2=null;
        $Q2A=null;
        $Q3=null;
        $Q3A=null;
        
        foreach ($reset as $resets)
        {
            $Email=$resets->Email;
            $Q1=$resets->Q1;
            $Q1A=$resets->Q1A;
            $Q2=$resets->Q2;
            $Q2A=$resets->Q2A;
            $Q3=$resets->Q3;
            $Q3A=$resets->Q3A;
        }
        if($request->get('ANS1')!=$Q1A)
        {
            $message="Question 1 answer not match ";
            return view('auth.passwords.resetquestion',compact('reset'))->with('message', $message);
        }
        if($request->get('ANS2')!=$Q2A)
        {
            $message="Question 2 answer not match ";
            return view('auth.passwords.resetquestion',compact('reset'))->with('message', $message);
        }
        if($request->get('ANS3')!=$Q3A)
        {
            $message="Question 3 answer not match ";
            return view('auth.passwords.resetquestion',compact('reset'))->with('message', $message);
        }
        $resets->Email = $request->get('Email');
        $message = null;
        return view('auth.setpass',compact('resets'))->with('message', $message);

    }
}
