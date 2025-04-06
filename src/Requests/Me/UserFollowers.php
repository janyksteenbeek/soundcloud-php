<?php

namespace Janyk\Soundcloud\Requests\Me;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * User followers
 */
class UserFollowers extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/me/followers';
    }

    /**
     * @param  null|int  $limit  Number of results to return in the collection.
     */
    public function __construct(
        protected ?int $limit = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['limit' => $this->limit]);
    }
}
