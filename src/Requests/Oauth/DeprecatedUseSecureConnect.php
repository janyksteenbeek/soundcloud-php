<?php

namespace Janyk\Soundcloud\Requests\Oauth;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Deprecated: Use secure connect.
 *
 * <h3>Security Advice</h3>
 * * [OAuth Authorization Code
 * flow](https://datatracker.ietf.org/doc/html/draft-ietf-oauth-security-topics-16#section-2.1.1)
 * (`response_type=code`) is the only allowed method of authorization.
 * * Use the `state` parameter for
 * [CSRF protection](https://tools.ietf.org/html/draft-ietf-oauth-security-topics-16#section-4.7). Pass
 * a sufficient  random nonce here and verify this nonce again after retrieving the token.
 */
class DeprecatedUseSecureConnect extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/connect';
    }

    /**
     * @param  string  $clientId  The client id belonging to your application
     * @param  string  $redirectUri  The redirect uri you have configured for your application
     * @param  string  $responseType  Support only the Authorization Code Flow
     * @param  null|string  $state  Any value included here will be appended to the redirect URI. Use this for CSRF protection.
     */
    public function __construct(
        protected string $clientId,
        protected string $redirectUri,
        protected string $responseType,
        protected ?string $state = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'response_type' => $this->responseType,
            'state' => $this->state,
        ]);
    }
}
