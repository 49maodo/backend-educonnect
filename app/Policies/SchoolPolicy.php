<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\School;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, School $school): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->hasRole(UserRole::ADMIN);
    }

    public function update(User $user, School $school): bool
    {
        return $user->hasRole(UserRole::ADMIN);
    }

    public function delete(User $user, School $school): bool
    {
        return $user->hasRole(UserRole::ADMIN);
    }

    public function restore(User $user, School $school): bool
    {
        return $user->hasRole(UserRole::ADMIN);
    }

    public function forceDelete(User $user, School $school): bool
    {
        return $user->hasRole(UserRole::ADMIN);
    }
}
