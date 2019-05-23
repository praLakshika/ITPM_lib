<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_issue extends Model
{
    protected $table = 'book_issue';

    protected $primarykey = 'id';
    protected $fillable = [
        'id','book_id', 'member_id','getdate','book_issued_day','book_returned_day','created_at','updated_at'
    ];
}
