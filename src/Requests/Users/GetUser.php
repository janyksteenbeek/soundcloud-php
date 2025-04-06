<?php

namespace Janyk\Soundcloud\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get user
 */
class GetUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->userId}";
    }

    /**
     * @param  int  $userId  SoundCloud User id
     */
    public function __construct(
        protected int $userId,
    ) {}
}
