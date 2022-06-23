<?php

namespace App\Policies;

use auth;
use App\Models\post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class postPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view($slug){

        return true;
    }

/**
 * Determine whether the user can view any thread.
 *
 * @param  \App\Models\User $user
 *
 * @return \Illuminate\Auth\Access\Response|bool
 */

public function viewAny()
{

    return true;
}





    /**


     * Determine whether the user can create models.
     *ser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create()
    {
        //
        return auth()->check() ? true : false;
    }

    public function edit(User $user)
    {
        //
        // return auth()->check() ? true : false;
        dd('auth()->check()');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, post $post)
    {
        //
        return $user->id ===$post->user_id || $user->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, post $post)
    {
        //
        return $user->id ===$post->user_id || $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, post $post)
    {
        //
    }
}
