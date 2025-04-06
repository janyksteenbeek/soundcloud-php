<?php

namespace Janyk\Soundcloud\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * User web profiles
 */
class UserWebProfiles extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->userId}/web-profiles";
    }

    /**
     * @param  int  $userId  SoundCloud User id
     * @param  null|int  $limit  Number of results to return in the collection.
     */
    public function __construct(
        protected int $userId,
        protected ?int $limit = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['limit' => $this->limit]);
    }
}
