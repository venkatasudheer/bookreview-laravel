<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','status','created_by','updated_by'
    ];

     protected $hidden = [
        'created_by','updated_by', 'created_at','updated_at',
    ];

    public function authors()
    {
        return $this->belongsToMany(Authors::class,Booksauthor::class);
    }
}
