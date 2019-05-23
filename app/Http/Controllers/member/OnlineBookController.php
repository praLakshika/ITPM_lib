<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PdfReport;
use Carbon\Carbon;
use App\Models\Auth\Role\Role;
use App\Models\Auth\User\User;
use App\Models\Online_library;
use App\Models\onlineBook_cat;
use Ramsey\Uuid\Uuid;
use Validator;
use App;
use File;

use Barryvdh\DomPDF\Facade as PDF;

class OnlineBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Online_librarys = Online_library::all();
        return view('member.online_book.index', compact('Online_librarys'));
    }

    
    public function show(Online_library $bookonline)
    {
        // $file='art.PNG';
        // $filename= public_path().'/img/'.$file;
        // File::delete($filename);
        return view('member.online_book.show',['bookonlines' => $bookonline]);
    }

    public function searchonlinelibrary(Request $request)
    {
        $Online_librarys = DB::table('online_library')
        ->orWhere('bookname', 'like',  $request['search'] . '%')
        ->get();
        return view('member.online_book.index', compact('Online_librarys'));
    }
}
