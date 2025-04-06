<?php

namespace Janyk\Soundcloud\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get following (deprecated)
 *
 * Returns (following_id) that is followed by (user_id).
 */
class GetFollowingDeprecated extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->userId}/followings/{$this->followingId}";
    }

    /**
     * @param  int  $userId  SoundCloud User id
     * @param  int  $followingId  SoundCloud User id to denote a Following of a user
     */
    public function __construct(
        protected int $userId,
        protected int $followingId,
    ) {}
}
