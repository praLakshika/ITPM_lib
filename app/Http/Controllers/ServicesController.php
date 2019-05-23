<?php

namespace App\Http\Controllers;
use App\Models\Service;

use App\Models\Book;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function services() {
        $Books = Book::all();
        
        return view('services',compact('Books'));
    }
}
