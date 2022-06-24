<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cours;
use Illuminate\Auth\Access\HandlesAuthorization;


class CoursPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    static public function update(User $user, Cours $cours)
    {
        return $user->id==$cours->user_id;
    }

}
