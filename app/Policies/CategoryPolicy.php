<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isSuperadmin();
    }

    public function view(User $user, Category $category): bool
    {
        return $user->isAdmin() || $user->isSuperadmin();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isSuperadmin();
    }

    public function update(User $user, Category $category): bool
    {
        return $user->isAdmin() || $user->isSuperadmin();
    }

    public function delete(User $user, Category $category): bool
    {
        return ($user->isAdmin() || $user->isSuperadmin()) && $category->posts()->doesntExist();
    }

    public function restore(User $user, Category $category): bool
    {
        return $user->isSuperadmin();
    }

    public function forceDelete(User $user, Category $category): bool
    {
        return $user->isSuperadmin();
    }
}

