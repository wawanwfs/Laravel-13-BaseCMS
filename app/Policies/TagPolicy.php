<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;

class TagPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isSuperadmin();
    }

    public function view(User $user, Tag $tag): bool
    {
        return $user->isAdmin() || $user->isSuperadmin();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isSuperadmin();
    }

    public function update(User $user, Tag $tag): bool
    {
        return $user->isAdmin() || $user->isSuperadmin();
    }

    public function delete(User $user, Tag $tag): bool
    {
        return ($user->isAdmin() || $user->isSuperadmin()) && $tag->posts()->doesntExist();
    }

    public function restore(User $user, Tag $tag): bool
    {
        return $user->isSuperadmin();
    }

    public function forceDelete(User $user, Tag $tag): bool
    {
        return $user->isSuperadmin();
    }
}

