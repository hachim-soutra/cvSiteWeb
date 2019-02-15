<?php

namespace App\Policies;

use App\User;
use App\Competence;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompetencePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the competence.
     *
     * @param  \App\User  $user
     * @param  \App\Competence  $competence
     * @return mixed
     */
    public function view(User $user, Competence $competence)
    {
        //
    }

    /**
     * Determine whether the user can create competences.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the competence.
     *
     * @param  \App\User  $user
     * @param  \App\Competence  $competence
     * @return mixed
     */
    public function update(User $user, Competence $competence)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the competence.
     *
     * @param  \App\User  $user
     * @param  \App\Competence  $competence
     * @return mixed
     */
    public function delete(User $user, Competence $competence)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the competence.
     *
     * @param  \App\User  $user
     * @param  \App\Competence  $competence
     * @return mixed
     */
    public function restore(User $user, Competence $competence)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the competence.
     *
     * @param  \App\User  $user
     * @param  \App\Competence  $competence
     * @return mixed
     */
    public function forceDelete(User $user, Competence $competence)
    {
        //
    }
}
