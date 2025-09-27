<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Diploma;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiplomaPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Diploma $diploma): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->hasRole(UserRole::ADMIN);
    }

    public function update(User $user, Diploma $diploma): bool
    {
        return $user->hasRole(UserRole::ADMIN);
    }

    public function delete(User $user, Diploma $diploma): bool
    {
        return $user->hasRole(UserRole::ADMIN);
    }

    public function restore(User $user, Diploma $diploma): bool
    {
        return $user->hasRole(UserRole::ADMIN);
    }

    public function forceDelete(User $user, Diploma $diploma): bool
    {
        return $user->hasRole(UserRole::ADMIN);
    }
}
