<?php

namespace Janyk\Soundcloud\Requests\Me;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Follow user
 */
class FollowUser extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/me/followings/{$this->userId}";
    }

    /**
     * @param  int  $userId  SoundCloud User id
     */
    public function __construct(
        protected int $userId,
    ) {}
}
