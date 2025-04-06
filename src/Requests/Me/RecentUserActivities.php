<?php

namespace Janyk\Soundcloud\Requests\Me;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Recent user activities
 */
class RecentUserActivities extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/me/activities/all/own';
    }

    /**
     * @param  null|array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  null|int  $limit  Number of results to return in the collection.
     */
    public function __construct(
        protected ?array $access = null,
        protected ?int $limit = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['access' => $this->access, 'limit' => $this->limit]);
    }
}
