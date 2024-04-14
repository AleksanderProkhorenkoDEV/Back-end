<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];


    /**
     *  --------------------------------------------
     *       1-TO-1 RELATIONSHIP WITH AUTHORS
     *  --------------------------------------------
     */

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     *  --------------------------------------------
     *       SCOPES
     *  --------------------------------------------
     */


    public function scopeSearchTitle($query, $title){
        $search = '%'. $title .'%';
        return $query->where('title', 'like', $search);
        
    }
}
