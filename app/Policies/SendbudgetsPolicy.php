<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Sendbudgets;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SendbudgetsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function sendbudget(User $user, Sendbudgets $sendbudgets)
    {
        return $user->id == $sendbudgets->iduser
                    ? Response::allow()
                    : Response::deny('THIS ACTION IS UNAUTHORIZED.');
    }
}
