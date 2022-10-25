<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Businesses;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BusineessPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function busineespolicy(User $user, Businesses $businesses)
    {
        return $user->id == $businesses->user_id
                    ? Response::allow()
                    : Response::deny('THIS ACTION IS UNAUTHORIZED.');
    }
}
