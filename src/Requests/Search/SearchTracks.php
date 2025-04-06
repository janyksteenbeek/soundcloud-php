<?php

namespace Janyk\Soundcloud\Requests\Search;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Search tracks
 */
class SearchTracks extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/tracks';
    }

    /**
     * @param  null|string  $q  search
     * @param  null|string  $ids  A comma separated list of track ids to filter on
     * @param  null|string  $genres  A comma separated list of genres
     * @param  null|string  $tags  A comma separated list of tags
     * @param  null|array  $bpm  Return tracks with a specified bpm[from], bpm[to]
     * @param  null|array  $duration  Return tracks within a specified duration range
     * @param  null|array  $createdAt  (yyyy-mm-dd hh:mm:ss) return tracks created within the specified dates
     * @param  null|array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  null|int  $limit  Number of results to return in the collection.
     * @param  null|int  $offset  Offset of first result. Deprecated, use `linked_partitioning` instead.
     * @param  null|bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function __construct(
        protected ?string $q = null,
        protected ?string $ids = null,
        protected ?string $genres = null,
        protected ?string $tags = null,
        protected ?array $bpm = null,
        protected ?array $duration = null,
        protected ?array $createdAt = null,
        protected ?array $access = null,
        protected ?int $limit = null,
        protected ?int $offset = null,
        protected ?bool $linkedPartitioning = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'q' => $this->q,
            'ids' => $this->ids,
            'genres' => $this->genres,
            'tags' => $this->tags,
            'bpm' => $this->bpm,
            'duration' => $this->duration,
            'created_at' => $this->createdAt,
            'access' => $this->access,
            'limit' => $this->limit,
            'offset' => $this->offset,
            'linked_partitioning' => $this->linkedPartitioning,
        ]);
    }
}
