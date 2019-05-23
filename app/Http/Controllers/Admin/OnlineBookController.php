<?php

namespace App\Http\Controllers\admin;

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
        return view('admin.online_book.index', compact('Online_librarys'));
    }
    public function searchonline_book(Request $request)
    {
        $Online_librarys = DB::table('online_library')
        ->where('id', $request['search'])
        ->orWhere('bookname', 'like', '%' . $request['search'] . '%')
        ->get();
        return view('admin.online_book.index', compact('Online_librarys'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.online_book.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Online_library $Book, onlineBook_cat $Book_cat)
    {
        $Books = DB::table('online_library')->where('bookname', $request['book_name'])->get();
           
        $bookname="panding";
        foreach($Books as $Bookd)
        {
            $bookname=$Bookd->bookname;
        }
        
        if($bookname==$request['book_name'])
        {
            $message = 'This book name is use. Name is '.$bookname;
            return redirect()->back()->with('message', $message);
               
        }
        $validatedData = [
            'book_name' => 'required|regex:/^[a-zA-Z .]+$/u|max:255',
            'book_published_year' => 'required',
            'book_image' => 'required|image|mimes:jpg,png',
            'book_PDF' => 'required|mimes:pdf',
            'ids' =>'required'
        ];
        
        $customMessages = [
            'book_name.required' => 'Name is require',
            'book_image.required' => 'Name is require',
            'book_PDF.required' => 'Name is require',
            'book_image.mimes' => 'Book image must be image',
            'book_PDF.mimes' => 'Book PDF must be PDF document'
        ];
        $bookVals = DB::select('select * from online_library ORDER BY id DESC LIMIT 1');
        $checkid =$request->input('ids') ;
        if($checkid==null)
       {
        $message = 'select book category';
        return redirect()->intended(route('admin.online_book.add'))->with('message', $message);
       }
       $IDcount=count($checkid);
        $lastid = 0;
        foreach($bookVals as $bookVal)
        {
            $lastid=$bookVal->id;
        }
        $lastid=$lastid+1;

        $pdf_name="panding";
        $file=$request ->file('book_PDF');
        $type=$file->guessExtension();
        $pdf_name=$lastid."onlineBookpdf.".$type;
        $file->move('image/onlineBook/pdf',$pdf_name);
        
        $pic_name="panding";
        $file=$request ->file('book_image');
        $type=$file->guessExtension();
        $pic_name=$lastid."onlineBook.".$type;
        $file->move('image/onlineBook/pic',$pic_name);

        $Book->authorid=$request->get('book_author');
        $Book->bookname=$request->get('book_name');
        $Book->pdf_doc=$pdf_name;
        $Book->book_pic=$pic_name;
        $Book->book_published_year=$request->get('book_year');
        $Book->save();
       
        $bookVals = DB::select('select * from online_library ORDER BY id DESC LIMIT 1');
        
        foreach($bookVals as $bookVal)
        {
            $lastid=$bookVal->id;
        }
        
       for($i=0; $i<$IDcount; $i++ )
       {
        DB::insert('INSERT INTO `onlinebookcat` ( `bookid`,`book_cat_id`) VALUES ( ?,?)',[  $lastid,$checkid[$i]]);
       }
       $message = 'Add online book';
       return view('admin.online_book.success',['messages' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Online_library $bookonline)
    {
        // $file='art.PNG';
        // $filename= public_path().'/img/'.$file;
        // File::delete($filename);
        return view('admin.online_book.show',['bookonlines' => $bookonline]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Online_library $bookonline)
    {
        return view('admin.online_book.edit',['books' => $bookonline]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Online_library $bookonline)
    {
        $validatedData = [
            'name' => 'required|regex:/^[a-zA-Z .]+$/u|max:255',
            'book_image' => 'image|mimes:jpg,png',
            'book_PDF' => 'mimes:pdf'
        ];
        
        $customMessages = [
            'name.required' => 'Name is require',
            'book_image.mimes' => 'Book image must be image',
            'book_PDF.mimes' => 'Book PDF must be PDF document'
        ];

        $this->validate($request, $validatedData, $customMessages);
        $Booksonline = DB::select('select * from online_library where id ='.$request['id']);
        $file="panding";
        $lastid= "panding";
        $pic= "panding";
        $sname= "panding";
        foreach($Booksonline as $Book)
        {
        $file=$Book->pdf_doc;
        $lastid= $Book->id;
        $pic= $Book->book_pic;
        $sname=$Book->bookname;
        }
        if ($request->hasFile('book_image'))
        {
            if ($request->hasFile('book_PDF'))
            {
                if(($sname==$request['name']) ) 
                {
                $filename= public_path().'/image/onlineBook/pdf/'.$file;
                File::delete($filename);

                $filename= public_path().'/image/onlineBook/pic/'.$pic;
                File::delete($filename);

                $file="panding";
                $pdf_name="panding";
                $file=$request ->file('book_PDF');
                $type=$file->guessExtension();
                $pdf_name=$lastid."onlineBookpdf.".$type;
                $file->move('image/onlineBook/pdf',$pdf_name);

                $pic_name="panding";
                $file=$request ->file('book_image');
                $type=$file->guessExtension();
                $pic_name=$lastid."onlineBook.".$type;
                $file->move('image/onlineBook/pic',$pic_name);

                DB::table('online_library')
                    ->where('id', $request['id'])
                    ->update(['pdf_doc' => $pdf_name,'book_pic' => $pic_name]);
                    $message = 'Update  book picture and PDF document';
                    return view('admin.online_book.success',['messages' => $message]);
                }
                else{
                    $filename= public_path().'/image/onlineBook/pdf/'.$file;
                    File::delete($filename);
    
                    $filename= public_path().'/image/onlineBook/pic/'.$pic;
                    File::delete($filename);
    
                    $file="panding";
                    $pdf_name="panding";
                    $file=$request ->file('book_PDF');
                    $type=$file->guessExtension();
                    $pdf_name=$lastid."onlineBookpdf.".$type;
                    $file->move('image/onlineBook/pdf',$pdf_name);
    
                    $pic_name="panding";
                    $file=$request ->file('book_image');
                    $type=$file->guessExtension();
                    $pic_name=$lastid."onlineBook.".$type;
                    $file->move('image/onlineBook/pic',$pic_name);
    
                    DB::table('online_library')
                        ->where('id', $request['id'])
                        ->update(['bookname' => $request['name'],'pdf_doc' => $pdf_name,'book_pic' => $pic_name]);
                        $message = 'Update book name, book picture and PDF document';
                        return view('admin.online_book.success',['messages' => $message]);
                }
            }
            else
            {
                if(($sname==$request['name']) ) 
                {
                    $filename= public_path().'/image/onlineBook/pic/'.$pic;
                File::delete($filename);


                $pic_name="panding";
                $file=$request ->file('book_image');
                $type=$file->guessExtension();
                $pic_name=$lastid."onlineBook.".$type;
                $file->move('image/onlineBook/pic',$pic_name);

                DB::table('online_library')
                    ->where('id', $request['id'])
                    ->update(['book_pic' => $pic_name]);
                    $message = 'Update only book picture ';
                    return view('admin.online_book.success',['messages' => $message]);
                }
                else{
                $filename= public_path().'/image/onlineBook/pic/'.$pic;
                File::delete($filename);


                $pic_name="panding";
                $file=$request ->file('book_image');
                $type=$file->guessExtension();
                $pic_name=$lastid."onlineBook.".$type;
                $file->move('image/onlineBook/pic',$pic_name);

                DB::table('online_library')
                    ->where('id', $request['id'])
                    ->update(['bookname' => $request['name'],'book_pic' => $pic_name]);
                    $message = 'Update book name and book picture ';
                    return view('admin.online_book.success',['messages' => $message]);
            }
        }
        }
        else if($request->hasFile('book_PDF'))
        {
            if(($sname==$request['name']) ) 
            {
                
                $filename= public_path().'/image/onlineBook/pdf/'.$file;
                File::delete($filename);

                $file="panding";
                $pdf_name="panding";
                $file=$request ->file('book_PDF');
                $type=$file->guessExtension();
                $pdf_name=$lastid."onlineBookpdf.".$type;
                $file->move('image/onlineBook/pdf',$pdf_name);


                DB::table('online_library')
                    ->where('id', $request['id'])
                    ->update(['pdf_doc' => $pdf_name]);
                    $message = 'Update only PDF document';
                    return view('admin.online_book.success',['messages' => $message]);
            }
            else{
             
                    $filename= public_path().'/image/onlineBook/pdf/'.$file;
                    File::delete($filename);
    
                    $file="panding";
                    $pdf_name="panding";
                    $file=$request ->file('book_PDF');
                    $type=$file->guessExtension();
                    $pdf_name=$lastid."onlineBookpdf.".$type;
                    $file->move('image/onlineBook/pdf',$pdf_name);
    
    
                    DB::table('online_library')
                        ->where('id', $request['id'])
                        ->update(['bookname' => $request['name'],'pdf_doc' => $pdf_name]);
                        $message = 'Update book name and PDF document';
                        return view('admin.online_book.success',['messages' => $message]);
                           
            }
        }
        else if(($sname==$request['name']) ) 
            {
            $message = 'Nothing to update';
            return redirect()->intended(route('admin.online_book.edit',[$request->id]))->with('message', $message);
            }
            else
            {
                DB::table('online_library')
                ->where('id', $request['id'])
                ->update(['bookname' => $request['name']]);
                $message = 'Update only book name';
                return view('admin.online_book.success',['messages' => $message]);
            }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Online_library $bookonline)
    {
        return view('admin.online_book.delete',['books' => $bookonline]);
    }
    public function sedelete(Request $request)//Request $request, Employee $employee
    {
        $Booksonline = DB::select('select * from online_library where id ='.$request['id']);
        
        $file="panding";
        $lastid= "panding";
        foreach($Booksonline as $Book)
        {
        $file=$Book->pdf_doc;
        $lastid= $Book->id;
        }
        $filename= public_path().'/image/onlineBook/pdf/'.$file;
        File::delete($filename);
        
        DB::table('online_library')->where('id', $request['id'])->delete();
         return view('admin.online_book.success');
    }
}
