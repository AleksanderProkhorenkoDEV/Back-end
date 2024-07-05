<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'description',
        'author_id'
    ];

    protected $primaryKey = 'book_id';

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id', 'author_id');
    }

    public function rent():BelongsTo
    {
        return $this->belongsTo(Rent::class, 'book_id', 'book_id');
    }
}
