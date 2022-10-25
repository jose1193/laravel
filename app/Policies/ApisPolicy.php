<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Apis;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
class ApisPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function apispolicy(User $user, Apis $apisurl)
    {
        return $user->id == $apisurl->iduser
                    ? Response::allow()
                    : Response::deny('THIS ACTION IS UNAUTHORIZED.');
    }
}
