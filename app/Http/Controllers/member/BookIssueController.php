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
use App\Models\Book;
use App\Models\Book_issue;
use Ramsey\Uuid\Uuid;
use Validator;
use App;
use Barryvdh\DomPDF\Facade as PDF;
class BookIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Book_issues=Book_issue::all();
        return view('member.book_issue.index', compact('Book_issues'));
    }
    public function search_book_issue(Request $request)
    {
        $books = DB::table('book')
        ->orWhere('bookname', 'like',  $request['key'] . '%')
        ->get();
        $book_id=null;
        foreach($books as $book)
        {
            $book_id=$book->id;
        }
       
        $Book_issues = DB::table('book_issue')
        ->where('id', $request['key'])
        ->orWhere('book_id', $book_id)
        ->get();
        return view('member.book_issue.index', compact('Book_issues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();
        return view('admin.book_issue.indexadd', compact('members'));
    }
    public function book_issue_member(Request $request)
    {
        $members = DB::table('member')
        ->where('id', $request['search'])
        ->orWhere('name', 'like', '%' . $request['search'] . '%')
        ->orWhere('id', 'like', '%' . $request['search'] . '%')
        ->orWhere('email', 'like', '%' . $request['search'] . '%')
        ->get();
        return view('admin.book_issue.indexadd', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function selectbook(Member $member)
    {
       $id=$member->id;
       $Books=Book::all();
        return view('admin.book_issue.indexbooks', compact('Books','id'));
    }
    public function store(Book_issue $Book_issue,Request $request)
    {
        
        $id=$request->get('memberID');
        $Books =$request->get('bookID');


       $getdate = Carbon::parse($request->get('getdate'));
        $book_issued_day = Carbon::parse($request->get('book_issued_day'));

        $diff=date_diff($getdate,$book_issued_day);
        $length = $diff->format("%R%a");

        if($length<=0)
        {
             $message = 'Due date from today onwards';
            return view('admin.book_issue.add', compact('Books','id'))->with('message', $message);
        }
        else
        {
            
        $Book_issue->book_id=$request->get('bookID');
        $Book_issue->member_id=$request->get('memberID');
        $Book_issue->getdate=$request->get('getdate');
        $Book_issue->book_issued_day=$request->get('book_issued_day');
        $Book_issue->save();

        $Books = DB::select('select * from book where id ='.$request->get('bookID'));
        $Booknow=null;
        foreach($Books as $Book)
        {
            $Booknow=$Book->book_quantity_now;
        }
        $Booknow=$Booknow-1;
        DB::table('book')
           ->where('id', $request->get('bookID'))
           ->update(['book_quantity_now' => $Booknow]);


        return view('admin.book_issue.success');

    }
    }
    public function book_issue_book(Request $request)
    {
        $id=$request->get('memberID');
        $Books = DB::table('book')
        ->where('id', $request['search'])
        ->orWhere('bookname', 'like', '%' . $request['search'] . '%')
        ->orWhere('id', 'like', '%' . $request['search'] . '%')
        ->get();
        return view('admin.book_issue.indexbooks', compact('Books','id'));
    }
    
    public function book_issue_add(Request $request)
    {
        $id=$request->get('memberID');
        $Books =$request->get('bookID');

        return view('admin.book_issue.add', compact('Books','id'));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book_issue $Book_issue)
    {
        return view('member.book_issue.show', compact('Book_issue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function return(Book_issue $Book_issue)
    {
        return view('admin.book_issue.return',['books' => $Book_issue]);
    }

    public function returnbook(Request $request)
    {
        $now=$request->return;

        $book_issues = DB::select('select * from book_issue where id ='.$request->id);
        $book_issued_day="pandiing";
        foreach($book_issues as $book_issue)
        {
            $book_issued_day=$book_issue->book_issued_day;
        }

        $book_issued_day = Carbon::parse($book_issued_day);
        $end = Carbon::parse($now);
        
        $length = $book_issued_day->diffInDays($end);
        $diff=date_diff($end,$book_issued_day);
        $length = $diff->format("%R%a");
        
        
        if($length<0)
        {
            $length= ($length*-1);
             DB::table('book_issue')
                ->where('id', $request['id'])
                ->update(['book_returned_day' => $end]);
            
                 $length;
                 $idBookI=$request['id'];
                return view('admin.fine_collection.add',compact('length','idBookI'));

        }
        else
        {
            DB::table('book_issue')
                ->where('id', $request['id'])
                ->update(['book_returned_day' => $end]);
            
                return view('admin.book_issue.success');
        }
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
