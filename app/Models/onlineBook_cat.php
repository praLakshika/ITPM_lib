<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class onlineBook_cat extends Model
{
    protected $table = 'onlinebookcat';

    protected $primarykey = 'id';
    protected $fillable = [
        'id','bookid', 'book_cat_id','created_at','updated_at'
    ];
}
