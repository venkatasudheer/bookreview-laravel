<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booksauthor extends Model
{
    use HasFactory;

    protected $table = "book_authors";

    protected $fillable = ["authors_id","created_by","updated_by"];
}
