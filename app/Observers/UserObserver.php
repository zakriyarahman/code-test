<?php

namespace App\Observers;

use App\Exceptions\User\EmailAlreadyExistsException;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "saving" event.
     *
     * @param \App\Models\User $user
     * @return void
     * @throws EmailAlreadyExistsException
     */
    public function saving(User $user)
    {
        // Pick the email is it getting updating
        if ($user->isDirty($user->email)) {
            $email = $user->getAttribute('email');
            // Check if the email exists in the users table
            if ($user::query()->where('email', $email)->exists()) {
                throw new EmailAlreadyExistsException('This email is already taken.');
            }
        }
    }

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
