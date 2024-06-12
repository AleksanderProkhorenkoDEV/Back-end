<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'message'
    ];

    /** ----------- RELATIONSHIP ----------- */

    public function post () {
        return $this->hasOne(Post::class);
    }
}
