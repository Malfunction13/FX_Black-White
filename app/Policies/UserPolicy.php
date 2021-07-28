<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class UserPolicy {
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user) {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function view(User $user, User $model) {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create() {

        return !auth()->check(); // only non-authenticated users can create new accounts
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function update(User $user) {

        return $user->role === User::ADMIN;
    }

    /**
     * Moderators can only Activate and Extend subscription of users.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function activate(User $user) {

        return in_array($user->role, [User::MODERATOR, User::ADMIN]);
    }

    /**
     * Only administrator can deactivate user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function deactivate(User $user) {

        return $user->role === User::ADMIN;
    }

    /**
     * Moderators and admins can extend user's subscription.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function extend(User $user) {

        return in_array($user->role, [User::MODERATOR, User::ADMIN]);
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function delete(User $user) {

        return $user->role === User::ADMIN;
    }


    /**
     * Determine whether the user can request email reset link.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return boolean
     */
    public function resetEmail(User $user, User $model) {

        return $user->id === $model->id;
    }

    /**
     * Determine whether the user can request subscription extension.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return boolean
     */
    public function extendSubscription(User $user, User $model) {

        return $user->id === $model->id;
    }
}
