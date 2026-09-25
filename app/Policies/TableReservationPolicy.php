<?php

namespace App\Policies;

use App\Models\TableReservation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TableReservationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['restaurant', 'Restaurant']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TableReservation $tableReservation): bool
    {
        return $user->hasAnyRole(['restaurant', 'Restaurant']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['restaurant', 'Restaurant']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TableReservation $tableReservation): bool
    {
        return $user->hasAnyRole(['restaurant', 'Restaurant']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TableReservation $tableReservation): bool
    {
        return $user->hasAnyRole(['restaurant', 'Restaurant']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TableReservation $tableReservation): bool
    {
        return $user->hasAnyRole(['restaurant', 'Restaurant']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TableReservation $tableReservation): bool
    {
        return $user->hasAnyRole(['restaurant', 'Restaurant']);
    }
}
