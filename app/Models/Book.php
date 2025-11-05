<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Book extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'author_id',
        'publisher_id',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            // 값을 가져올 때(Accessor): Title Case
            get: fn ($value) => $value === null
                ? null
                : mb_convert_case($value, MB_CASE_TITLE, 'UTF-8'),

            // 값을 저장할 때(Mutator): UPPER CASE
            set: fn ($value) => $value === null
                ? null
                : mb_convert_case($value, MB_CASE_UPPER, 'UTF-8'),
        );
    }

    public function author()
    {
        return $this->belongsTo(\App\Models\Author::class); // FK: author_id
    }

    // Book : BookDetail = 1 : 1
    public function detail()
    {
        // FK 기본값이 book_details.book_id 이므로 인자 생략 가능
        return $this->hasOne(\App\Models\BookDetail::class, 'book_id');
    }

    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class);
    }
}
