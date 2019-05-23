<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Reset;
use Hash;
use App\Http\Requests\Pass;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        /*
         * Remove the socialite session variable if exists
         */

        \Session::forget(config('access.socialite_session_name'));

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }
    public function setreset(Request  $request,Reset $resets)
    {
        $resets->Email = $request->get('Email');
        $resets->Q1 = $request->get('Qt1');
        $resets->Q1A = $request->get('ANS1');
        $resets->Q2 = $request->get('Qt2');
        $resets->Q2A = $request->get('ANS2');
        $resets->Q3 = $request->get('Qt3');
        $resets->Q3A = $request->get('ANS3');
        $resets->save();
        return view('auth.resetpass',compact('resets'));
    }
    
    public function setpass(Request $request,Reset $resets)
    {   $resets->Email = $request->get('Email');
        $message = null;
        return view('auth.setpass',compact('resets'))->with('message', $message);
    }
    public function setnewpass(Request  $request,Reset $resets)
    {   $resets->Email = $request->get('Email');
        $resets->pass = $request->get('pass');
        $resets->Cpass = $request->get('Cpass');

        $password=$request->get('pass');
        $Cpassword=$request->get('Cpass');
        $userpass=null;
        $users =DB::select("select * from users WHERE `users`.`email` = '".$resets->Email."'");
        foreach($users as $user)
        {
            $userpass= $user->password;
        }
        if (Hash::check($password, $userpass))
          {
            $message = "Cann't Use NIC";
            return view('auth.setpass',compact('resets'))->with('message', $message);
        }
        if($password!=$Cpassword)
        {
            $message = "passwords and confirm password doesn"."'t match";
            return view('auth.setpass',compact('resets'))->with('message', $message);
        }
        if (strlen($password) <= '8') {
            $message = "Your Password Must Contain At Least 1 Number!";
            return view('auth.setpass',compact('resets'))->with('message', $message);
        }
        if (!preg_match("#[0-9]+#",$password)) {
            $message = "Your Password Must Contain At Least 8 Characters!";
            return view('auth.setpass',compact('resets'))->with('message', $message);
        }
        if (!preg_match("#[A-Z]+#",$password)) {
            $message = "Your Password Must Contain At Least 1 Capital Letter!";
            return view('auth.setpass',compact('resets'))->with('message', $message);
        }
        if (!preg_match("#[a-z]+#",$password)) {
            $message = "Your Password Must Contain At Least 1 Simple Letter!";
            return view('auth.setpass',compact('resets'))->with('message', $message);
        }
        DB::table('users')
            ->where('email', $resets->Email)
            ->update(['password' => bcrypt($request->get('pass'))]);
        return redirect()->route('login');;
    }
    public function reset1()
    {
        return view('auth.reset1');
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => __('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $errors = [];

        if (config('auth.users.confirm_email') && !$user->confirmed) {
            $errors = [$this->username() => __('auth.notconfirmed', ['url' => route('confirm.send', [$user->email])])];
        }

        if (!$user->active) {
            $errors = [$this->username() => __('auth.active')];
        }

        if ($errors) {
            auth()->logout();  //logout

            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors($errors);
        }

        return redirect()->intended($this->redirectPath());
    }
}
