<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_author extends Model
{
    protected $table = 'book_author';

    protected $primarykey = 'id';
    protected $fillable = [
        'id','name', 'birthday', 'address', 'pic','email', 'contact', 'created_at','updated_at'
    ];
}
