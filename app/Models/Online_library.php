<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Online_library extends Model
{
    protected $table = 'online_library';

    protected $primarykey = 'id';
    protected $fillable = [
        'id', 'authorid', 'bookname', 'pdf_doc', 'book_pic','book_published_year', 'created_at','updated_at'
    ];
}
