<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'name',
        'id_number',
        'relationship_to_prisoner',
    ];
}