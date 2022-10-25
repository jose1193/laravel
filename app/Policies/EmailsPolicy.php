<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Emails;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EmailsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function emails(User $user, Emails $email)
    {
        return $user->id == $email->iduser
                    ? Response::allow()
                    : Response::deny('THIS ACTION IS UNAUTHORIZED.');
    }
}
