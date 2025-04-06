<?php

namespace Janyk\Soundcloud\Requests\Me;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get follower (deprecated)
 */
class GetFollowerDeprecated extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/me/followers/{$this->followerId}";
    }

    /**
     * @param  int  $followerId  SoundCloud User id to denote a Follower
     */
    public function __construct(
        protected int $followerId,
    ) {}
}
