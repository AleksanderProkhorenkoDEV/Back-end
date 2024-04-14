<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Note;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surnames',
    ];


     /**
     *  --------------------------------------------
     *       1-TO-N RELATIONSHIP WITH NOTES
     *  --------------------------------------------
     */

    public function notes()
    {
        return $this->hasMany(Note::class);
    }



}
