<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Models\Book_category;
use App\Models\Book;
use App\Models\Book_cat;
use App\Models\Fine_fee;

use Validator;
use Illuminate\Support\Facades\DB;

use File;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Books = Book::all();
      
        return view('member.book.index', compact('Books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.add');
    }

    public function searchBook(Request $request)
    {
        $Books = DB::table('book')
        ->where('id', $request['search'])
        ->orWhere('bookname', 'like', '%' . $request['search'] . '%')
        ->get();
        return view('member.book.index', compact('Books'));
    }

    public function show(Book $book)
    {
        return view('member.book.show',['books' => $book]);
    }

   
}
