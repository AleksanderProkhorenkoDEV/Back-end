<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;

class Rent extends Model
{
    use HasFactory;


    protected $fillable = [
        'loan_date',
        'deadline',
    ];

    protected $guarded = [
        'book_id',
        'user_id'
    ];

    protected $primaryKey = 'rent_id';


    public function book(): hasOne
    {                       //Class     Foreing Key   Reference in your table
        return $this->hasOne(Book::class, 'book_id', 'book_id');
    }

    /**
     * Get the user that owns the Rent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
