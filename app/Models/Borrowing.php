<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrowing extends Model
{
    protected $fillable = [
        'member_id',
        'book_id',
        'borrow_date',
        'due_date',
        'returned_date',
        'status',
        'fine_amount',
        'notes',
    ];

    protected $casts = [
        'borrow_date' => 'date',
        'due_date' => 'date',
        'returned_date' => 'date',
    ];

    /**
     * Get the member that this borrowing belongs to
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    /**
     * Get the book that this borrowing belongs to
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
