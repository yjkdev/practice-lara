<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    //
    use HasFactory;
    
    protected $primaryKey = 'book_id';

    public function book()
    {
        // 기본 FK: book_details.book_id
        return $this->belongsTo(\App\Models\Book::class, 'book_id');
    }
}
