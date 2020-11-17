<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthdate',
        'about',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get Favourite Contacts
     *
     * @return User|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favouriteContacts()
    {
        return $this->belongsToMany('App\Models\User', 'favourite_contacts', 'owner_id', 'contact_id');
    }


    /**
     * Check if contact owned by user
     *
     * @return bool
     */
    public function isLikedByUser($user)
    {
        return $user->favouriteContacts->find($this->id) ? true : false;
    }

}
