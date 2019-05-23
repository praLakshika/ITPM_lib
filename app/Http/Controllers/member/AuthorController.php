<?php

namespace App\Http\Controllers\member;

use Carbon\Carbon;
use App\Models\Book_author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use File;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Book_authors=Book_author::all();
        return view('member.author.index', compact('Book_authors'));
    }

    public function show(Book_author $Book_author)
    {
          return view('member.author.show',['Book_authors' => $Book_author]);
    }

   
   
    public function authorsearchauthor(Request $request)
    {
        $Book_authors = DB::table('book_author')
        ->where('id', $request['search'])
        ->orWhere('name', 'like', '%' . $request['search'] . '%')
        ->get();

        return view('member.author.index', compact('Book_authors'));
    }

}
