<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'surnames',
        'name',
        'nationality',
    ];

    protected $primaryKey = 'author_id';

    public function books():hasMany
    {
        return $this->hasMany(Book::class, 'author_id', 'author_id');
    }
}
