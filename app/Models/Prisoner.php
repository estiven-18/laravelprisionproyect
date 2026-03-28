<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prisoner extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'entry_datetime',
        'crime',
        'cell',
        'state',
    ];

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}