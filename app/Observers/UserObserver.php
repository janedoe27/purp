<?php

namespace App\Observers;

use App\User;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    public function creating(User $user)
    {
        $admin_emails = config('app.admin_default_emails');
        $staff_emails = config('app.staff_default_emails');

        if (in_array($user->email, $admin_emails)) {
            $user->is_admin = 1;
            $user->is_staff = 1;
        } elseif (in_array($user->email, $staff_emails)) {
            $user->is_staff = 1;
        }
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }
}