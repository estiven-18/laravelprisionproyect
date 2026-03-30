<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Prisoner
 *
 * @property $id
 * @property $name
 * @property $birth_date
 * @property $entry_datetime
 * @property $crime
 * @property $cell
 * @property $state
 * @property $created_at
 * @property $updated_at
 *
 * @property Visit[] $visits
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Prisoner extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'birth_date', 'entry_datetime', 'crime', 'cell', 'state'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visits()
    {
        return $this->hasMany(\App\Models\Visit::class, 'id', 'prisoner_id');
    }
    
}
