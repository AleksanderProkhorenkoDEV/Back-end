<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];


    /** ----------- RELATIONSHIP ----------- */

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function comments () {
        return $this->hasMany(Comment::class);
    }

    /** ----------- SCOPES ----------- */

    public function scopesearchByTitle($query, $type){
        return $type != null ? $query->where('title', 'LIKE', $type['title'] . '%') : $query;
    }
}
