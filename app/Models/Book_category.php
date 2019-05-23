<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_category extends Model
{
    protected $table = 'book_category';

    protected $primarykey = 'id';
    protected $fillable = [
        'id','book_category_name','created_at','updated_at'
    ];
}
