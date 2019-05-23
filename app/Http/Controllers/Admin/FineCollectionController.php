<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Models\Book_category;
use App\Models\Book;
use App\Models\Book_cat;
use App\Models\Book_fine_collection;
use App\Models\Fine_fee;

use Illuminate\Support\Facades\DB;
class FineCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Book_fine_collection = Book_fine_collection::all();
      
        return view('admin.fine_collection.index', compact('Book_fine_collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fine_fee()
    {
        $Fine_fee=Fine_fee::all();
        return view('admin.fine_collection.fine_fee',compact('Fine_fee'));
    }
    public function fine_feeadd()
    {
        return view('admin.fine_collection.fine_feeadd');
    }
    public function searchfine(Request $request)
    {
        // $members = DB::table('member')
        // ->orWhere('name', 'like', '%'. $request['search'] . '%')
        // ->get();
        // $member_id=null;
        // foreach($members as $member)
        // {
        //     $member_id=$member->id;
        // }
        // $book_id=nul
        
        // $Book_issues = DB::table('book_issue')
        // ->where('id', $request['search'])
        // ->orWhere('member_id', 'like', $member_id)
        // ->get();
        $Book_fine_collection  = DB::table('book_fine_collection')
        ->where('id', $request['key'])
        ->get();
        return view('admin.fine_collection.index', compact('Book_fine_collection'));
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Book_fine_collection $Book_fine_collection)
    {
        $Book_fine_collection->delayed_days=$request->get('delayed_days');
        $Book_fine_collection->fine_fee_id=$request->get('fine_fee_id');
        $Book_fine_collection->book_issued_id=$request->get('book_issued_id');
        $Book_fine_collection->find_fee=$request->get('find_fee');
        $Book_fine_collection->save();
        return view('admin.fine_collection.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fine_fee $fine)
    {
        return view('admin.fine_collection.edit',['fee' => $fine]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Fine_fee $fine)
    {
        $validatedData = [
            'fee_per_day' => 'required|numeric|integer'
            
        ];
        $customMessages = [
            'fee_per_day.numeric' =>  'Book fine fee must be numeric',
            'fee_per_day.integer' =>  'Book fine fee must be integer'
        ];
        $this->validate($request, $validatedData, $customMessages);

        $Books = DB::select('select * from fine_fee where id ='.$request['id']);
        foreach($Books as $Book)
          {
            $fee_per_day=$Book->fee_per_day;
            if(($fee_per_day==$request['fee_per_day']) ) 
            {
                $message = 'Nothing to update';
              return redirect()->intended(route('admin.fine_fee.edit',[$request->id]))->with('message', $message);
              }
              else
              {
            DB::table('fine_fee')
                ->where('id', $request['id'])
                ->update(['fee_per_day' => $request['fee_per_day']]);
            
                return view('admin.fine_collection.success');
          }
        }
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
