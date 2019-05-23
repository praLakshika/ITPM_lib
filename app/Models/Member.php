<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';

    protected $primarykey = 'id';
    protected $fillable = [
        'id','name', 'nic', 'mbr_pic', 'email','contact', 'birthday','address', 'created_at','updated_at'
    ];
}
