<?php

namespace Janyk\Soundcloud\Requests\Oauth;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Deprecated: Use secure token endpoint.
 */
class DeprecatedUseSecureTokenEndpoint extends Request
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/oauth2/token';
    }

    public function __construct() {}
}
