<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create, update  or delete models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function store(User $user) {

        return $user->role === User::ADMIN;
    }

}
