<?php
/*
 * This file is part of fof/sentry
 *
 * Copyright (c) 2018 FriendsOfFlarum.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Myguitare\Auth\Middleware;

use Flarum\Http\Exception\TokenMismatchException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface as Handler;

class HandleAuthMiddleware implements Middleware
{
    /**
     * {@inheritdoc}
     */
    public function process(Request $request, Handler $handler): Response
    {
        $queryParams = $request->getQueryParams();
        $cookie = array_get($queryParams, 'cookie');

        if ($cookie) {
//            setcookie('remember_token', 'xxxx', time() + 36000, '/');
//            setcookie('remember_token', 'xxxx', time() + 36000, '/');
//            setcookie('remember_token', 'xxxx', time() + 36000, '/');
        }
        $session = $request->getAttribute('session');
        $queryParams = $request->getQueryParams();
//        print_r($queryParams);
        $cookie = array_get($queryParams, 'cookie');
//        print_r($_COOKIE);
        if ($session) {
            // id = $session->get('user_id')
            return $handler->handle($request);
        } else {
            $queryParams = $request->getQueryParams();
//            print_r($queryParams);
            $cookie = array_get($queryParams, 'cookie');
//        print_r($cookie);
            setcookie('flarum_session', $cookie, time() + 36000, '/');
            setcookie('remember_token', $cookie, time() + 36000, '/');
            setcookie('flarum_remember', $cookie, time() + 36000, '/');
        }

        return $handler->handle($request);
    }
}