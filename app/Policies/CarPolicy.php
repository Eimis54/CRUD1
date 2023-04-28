<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CarPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Car $car)
    {
        return $user->id==$car->owner->user_id || $user->type=="admin" || $user->type=="reader";;;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Car $car)
    {
        return $user->id==$car->owner->user_id || $user->type=="admin";;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Car $car)
    {
        return $user->id==$car->owner->user_id || $user->type=="admin";;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Car $car)
    {
        return $user->id==$car->owner->user_id|| $user->type=="admin";;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Car $car)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Car $car)
    {
        //
    }
}
