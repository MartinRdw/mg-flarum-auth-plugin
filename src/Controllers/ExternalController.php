<?php

namespace Myguitare\Auth\Controllers;

use Exception;
use Flarum\Forum\Auth\Registration;
use Flarum\Forum\Auth\ResponseFactory;
use Flarum\Http\UrlGenerator;
use Flarum\Settings\SettingsRepositoryInterface;
use GuzzleHttp\Cookie\SetCookie;
use League\OAuth2\Client\Provider\Facebook;
use League\OAuth2\Client\Provider\FacebookUser;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\RedirectResponse;

class ExternalController implements RequestHandlerInterface
{

    protected $cookie;

    /**
     * @param Request $request
     * @return ResponseInterface
     */
    public function handle(Request $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        $cookie = array_get($queryParams, 'cookie');

        // set for 30 days
        setcookie('flarum_remember', $cookie, time() + 60 * 60 * 24 * 30, '/');

        return new RedirectResponse('/');
    }
}
