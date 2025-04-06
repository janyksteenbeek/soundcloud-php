<?php

namespace Janyk\Soundcloud\Resource;

use Janyk\Soundcloud\Requests\Oauth\DeprecatedUseSecureConnect;
use Janyk\Soundcloud\Requests\Oauth\DeprecatedUseSecureTokenEndpoint;
use Janyk\Soundcloud\Resource;
use Saloon\Http\Response;

class Oauth extends Resource
{
    /**
     * @param  string  $clientId  The client id belonging to your application
     * @param  string  $redirectUri  The redirect uri you have configured for your application
     * @param  string  $responseType  Support only the Authorization Code Flow
     * @param  string  $state  Any value included here will be appended to the redirect URI. Use this for CSRF protection.
     */
    public function deprecatedUseSecureConnect(
        string $clientId,
        string $redirectUri,
        string $responseType,
        ?string $state,
    ): Response {
        return $this->connector->send(new DeprecatedUseSecureConnect($clientId, $redirectUri, $responseType, $state));
    }

    public function deprecatedUseSecureTokenEndpoint(): Response
    {
        return $this->connector->send(new DeprecatedUseSecureTokenEndpoint);
    }
}
