<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fine_fee extends Model
{
   
    protected $table = 'fine_fee';

    protected $primarykey = 'id';
    protected $fillable = [
        'id','bookcatid', 'fee_per_day','created_at','updated_at'
    ];
}
