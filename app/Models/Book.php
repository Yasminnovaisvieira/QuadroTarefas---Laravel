<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    // app/Models/Book.php
protected $fillable = ['title', 'author', 'publication_year', 'description', 'image', 'genre'];


}
