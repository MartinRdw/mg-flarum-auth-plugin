<?php
/*
 * This file is part of fof/sentry
 *
 * Copyright (c) 2018 FriendsOfFlarum.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Myguitare\Auth\Extend;

use Flarum\Event\ConfigureMiddleware;
use Flarum\Extend\ExtenderInterface;
use Flarum\Extension\Extension;
use Myguitare\Auth\Middleware\HandleAuthMiddleware;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;

class HandleAuth implements ExtenderInterface
{
    public function extend(Container $container, Extension $extension = null)
    {
        /** @var Dispatcher $events */
        $events = $container->make(Dispatcher::class);
        $events->listen(ConfigureMiddleware::class, function (ConfigureMiddleware $event) use ($container) {
//            $container->instance('sentry.stack', $event->isApi() ? 'api' : ($event->isForum() ? 'forum' : 'admin'));
            $event->pipe(app(HandleAuthMiddleware::class));
        });
    }
}