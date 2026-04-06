<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('category.view');
    }

    public function create(User $user)
    {
        return $user->can('category.create');
    }

    public function update(User $user, Category $category)
    {
        return $user->can('category.edit');
    }

    public function delete(User $user, Category $category)
    {
        return $user->can('category.delete');
    }
}
