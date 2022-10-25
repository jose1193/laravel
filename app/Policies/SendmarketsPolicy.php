<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Sendmarkets;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SendmarketsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function sendmarkets(User $user, Sendmarkets $sendmarket)
    {
        return $user->id == $sendmarket->users_id
                    ? Response::allow()
                    : Response::deny('THIS ACTION IS UNAUTHORIZED.');
    }
}
