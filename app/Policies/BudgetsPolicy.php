<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Budgets;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BudgetsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function budgets(User $user, Budgets $budget)
    {
        return $user->id == $budget->iduser
                    ? Response::allow()
                    : Response::deny('THIS ACTION IS UNAUTHORIZED.');
    }
}
