<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_fine_collection extends Model
{
    protected $table = 'book_fine_collection';

    protected $primarykey = 'id';
    protected $fillable = [
        'id','delayed_days', 'fine_fee_id','book_issued_id','find_fee','created_at','updated_at'
    ];
}
