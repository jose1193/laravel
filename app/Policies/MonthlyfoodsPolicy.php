<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Monthlyfoods;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class MonthlyfoodsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function monthlyfoods(User $user, Monthlyfoods $monthlyfood)
    {
        return $user->id == $monthlyfood->users_id
                    ? Response::allow()
                    : Response::deny('THIS ACTION IS UNAUTHORIZED.');
    }
}
