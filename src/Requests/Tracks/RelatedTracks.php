<?php

namespace Janyk\Soundcloud\Requests\Tracks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Related tracks
 */
class RelatedTracks extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/tracks/{$this->trackId}/related";
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     * @param  null|array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  null|int  $limit  Number of results to return in the collection.
     * @param  null|int  $offset  Offset of first result. Deprecated, use `linked_partitioning` instead.
     * @param  null|bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function __construct(
        protected int $trackId,
        protected ?array $access = null,
        protected ?int $limit = null,
        protected ?int $offset = null,
        protected ?bool $linkedPartitioning = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'access' => $this->access,
            'limit' => $this->limit,
            'offset' => $this->offset,
            'linked_partitioning' => $this->linkedPartitioning,
        ]);
    }
}
