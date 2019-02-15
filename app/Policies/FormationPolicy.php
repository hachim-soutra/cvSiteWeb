<?php

namespace App\Policies;

use App\User;
use App\Formation;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the formation.
     *
     * @param  \App\User  $user
     * @param  \App\Formation  $formation
     * @return mixed
     */
    public function view(User $user, Formation $formation)
    {
        //
    }

    /**
     * Determine whether the user can create formations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the formation.
     *
     * @param  \App\User  $user
     * @param  \App\Formation  $formation
     * @return mixed
     */
    public function update(User $user, Formation $formation)
    {
        //
    }

    /**
     * Determine whether the user can delete the formation.
     *
     * @param  \App\User  $user
     * @param  \App\Formation  $formation
     * @return mixed
     */
    public function delete(User $user, Formation $formation)
    {
        //
    }

    /**
     * Determine whether the user can restore the formation.
     *
     * @param  \App\User  $user
     * @param  \App\Formation  $formation
     * @return mixed
     */
    public function restore(User $user, Formation $formation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the formation.
     *
     * @param  \App\User  $user
     * @param  \App\Formation  $formation
     * @return mixed
     */
    public function forceDelete(User $user, Formation $formation)
    {
        //
    }
}
