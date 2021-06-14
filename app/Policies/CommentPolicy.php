<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    protected function manage(User $user, Comment $comment): bool
    {
        return $user->isAdmin() || $user->id === $comment->post->user_id || $user->id === $comment->user_id;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Comment $comment
     * @return bool
     */
    public function view(User $user, Comment $comment): bool
    {
        return true;

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Comment $comment
     * @return bool
     */
    public function update(User $user, Comment $comment): bool
    {
        return $this->manage($user, $comment);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Comment $comment
     * @return bool
     */
    public function delete(User $user, Comment $comment): bool
    {
        return $this->manage($user, $comment);

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Comment $comment
     * @return void
     */
    public function restore(User $user, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Comment $comment
     * @return void
     */
    public function forceDelete(User $user, Comment $comment)
    {
        //
    }
}
