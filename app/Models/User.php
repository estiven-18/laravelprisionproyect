<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $id_number
 * @property $email
 * @property $password
 * @property $rol_id
 * @property $state
 * @property $created_at
 * @property $updated_at
 *
 * @property Rol $rol
 * @property GuardSession[] $guardSessions
 * @property Visit[] $visits
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'id_number', 'email', 'rol_id', 'state'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this->belongsTo(\App\Models\Rol::class, 'rol_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guardSessions()
    {
        return $this->hasMany(\App\Models\GuardSession::class, 'id', 'user_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visits()
    {
        return $this->hasMany(\App\Models\Visit::class, 'id', 'user_id');
    }
    
}
