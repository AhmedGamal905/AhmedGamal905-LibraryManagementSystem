<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    // You can define the attributes that are mass assignable.
    protected $fillable = [
        // 'title',
        // 'author',
        // 'published_year',
        // ...
    ];
}
