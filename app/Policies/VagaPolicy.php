<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vaga;
use Illuminate\Auth\Access\HandlesAuthorization;

class VagaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Vaga $vaga)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return ! $user->candidato;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Vaga $vaga)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Vaga $vaga)
    {
        return ! $user->candidato;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Vaga $vaga)
    {
        return ! $user->candidato;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Vaga $vaga)
    {
        return ! $user->candidato;
    }
}