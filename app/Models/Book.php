<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';

    protected $primarykey = 'id';
    protected $fillable = [
        'id','authorid', 'bookname','book_quantity_full','book_quantity_now','book_pic','book_published_year','created_at','updated_at'
    ];
}
