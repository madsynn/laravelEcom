<?php

namespace App\Models;

use Cartalyst\Sentinel\Users\EloquentUser;

/**
 * Class User.
 * @Bind("users")
 * @author Phillip Madsen <contact@affordableprogrammer.com>
 */
class User extends EloquentUser
{



    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
