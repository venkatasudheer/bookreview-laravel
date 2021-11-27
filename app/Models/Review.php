<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'review','status','book_id','created_by','updated_by'
    ];

    protected $hidden = [
        'created_by','updated_by', 'created_at','updated_at',
    ];

}
