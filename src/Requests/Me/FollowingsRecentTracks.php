<?php

namespace Janyk\Soundcloud\Requests\Me;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Followings' recent tracks
 */
class FollowingsRecentTracks extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/me/followings/tracks';
    }

    /**
     * @param  null|array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  null|int  $limit  Number of results to return in the collection.
     * @param  null|int  $offset  Offset of first result. Deprecated, use `linked_partitioning` instead.
     */
    public function __construct(
        protected ?array $access = null,
        protected ?int $limit = null,
        protected ?int $offset = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['access' => $this->access, 'limit' => $this->limit, 'offset' => $this->offset]);
    }
}
