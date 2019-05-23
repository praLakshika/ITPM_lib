<?php

namespace App\Http\Controllers\member;

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
      
        return view('member.fine_collection.index', compact('Book_fine_collection'));
    }

    public function searchfine(Request $request)
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
        ->Where('book_id', $book_id)
        ->get();

        $book_issued_id=null;

        foreach($Book_issues as $Book_issu)
        {
            $book_issued_id=$Book_issu->id;
        }

        $Book_fine_collection  = DB::table('book_fine_collection')
        ->orWhere('book_issued_id', $book_issued_id)
        ->get();
        return view('member.fine_collection.index', compact('Book_fine_collection'));
    }

    public function show($id)
    {
        //
    }

   
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
