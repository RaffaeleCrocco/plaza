<?php

/*
 * This file is part of plaza/plaza.
 *
 * Copyright (c) 2020 Plaza Community.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Plaza\Plaza\Listeners;

use Flarum\User\Event\Saving;
use Flarum\Foundation\ValidationException;
use Illuminate\Contracts\Events\Dispatcher;

class UserSaving
{
    /**
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(Saving::class, [$this, 'whenUserSaving']);
    }

    /**
     * @param Saving $event
     */
    public function whenUserSaving(Saving $event)
    {
        $email = array_get($event->data, 'attributes.email');
        $domain = substr(strrchr($email, "@"), 1);

        if ($email !== null && !ends_with($domain, "unitn.it")) {
            throw new ValidationException([
                app('translator')->trans('plaza.error.wrong_email_domain_message'),
            ]);
        }
    }
}
