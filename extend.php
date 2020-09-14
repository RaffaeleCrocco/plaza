<?php

/*
 * This file is part of plaza/plaza.
 *
 * Copyright (c) 2020 Plaza Community.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Plaza\Plaza;

use Flarum\Extend;
use Illuminate\Events\Dispatcher;

return [
    new Extend\Locales(__DIR__.'/locale'),
    function (Dispatcher $events) {
        /*
         * Events
         */
        $events->subscribe(Listeners\UserSaving::class);
    },
];
