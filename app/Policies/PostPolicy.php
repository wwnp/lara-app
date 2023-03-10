<?php

namespace App\Policies;

use App\Enums\User\UserRole;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $user, Post $post)
    {
        $role = $user->roles->first()->role;
        switch ($role) {
            case UserRole::ADMIN->value:
                return true;
            case UserRole::AUTHOR->value:
                return $user->id === $post->user_id;
            default:
                return false;
        }
    }
}
