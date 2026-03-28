<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visit extends Model
{
    protected $fillable = [
        'date',
        'start_time',
        'end_time',
        'prisoner_id',
        'visitor_id',
        'user_id',
        'state',
    ];

    public function visitor(): BelongsTo
    {
        return $this->belongsTo(Visitor::class);
    }

    public function prisoner(): BelongsTo
    {
        return $this->belongsTo(Prisoner::class);
    }

    public function assignedGuard(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}