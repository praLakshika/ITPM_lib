<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_cat extends Model
{
    protected $table = 'book_cat';

    protected $primarykey = 'id';
    protected $fillable = [
        'id','bookid', 'book_cat_id','created_at','updated_at'
    ];
}
