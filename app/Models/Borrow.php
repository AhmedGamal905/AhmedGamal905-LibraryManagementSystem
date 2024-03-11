<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    protected $fillable = [
        'due_date',
        'book_id',
        'status',
        'user_id',
    ];
}
