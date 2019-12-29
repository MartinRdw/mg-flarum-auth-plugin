<?php

namespace Myguitare\Auth;

use Flarum\Extend;
use Myguitare\Auth\Extend\HandleAuth;

return [
    new HandleAuth(),

    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js'),

    (new Extend\Routes('api'))
        ->get('/auth/external', 'auth.external', Controllers\ExternalController::class),
];
