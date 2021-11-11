<?php

namespace App\Policies;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PetPolicy
{
    use HandlesAuthorization;

    /**
     * TODO: use a role/permission from the database for this
     */
    private const ADMIN_USERNAME = 'andrew';

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Pet $pet)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->name === self::ADMIN_USERNAME;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Pet $pet)
    {
        return $user->name === self::ADMIN_USERNAME;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Pet $pet)
    {
        return $user->name === self::ADMIN_USERNAME;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Pet $pet)
    {
        return $user->name === self::ADMIN_USERNAME;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Pet $pet)
    {
        return $user->name === self::ADMIN_USERNAME;
    }
}
