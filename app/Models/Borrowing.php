<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Borrowing extends Model
{
    protected $fillable = [
        'user_id',
        'member_id',
        'borrowing_date',
        'due_date',
        'return_date',
        'status',
    ];

    protected $casts = [
        'borrowing_date' => 'date',
        'due_date'       => 'date',
        'return_date'    => 'date',
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(BorrowingDetail::class);
    }
}