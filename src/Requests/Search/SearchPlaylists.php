<?php

namespace Janyk\Soundcloud\Requests\Search;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Search playlists
 */
class SearchPlaylists extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/playlists';
    }

    /**
     * @param  null|string  $q  search
     * @param  null|array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  null|bool  $showTracks  A boolean flag to request a playlist with or without tracks. Default is `true`.
     * @param  null|int  $limit  Number of results to return in the collection.
     * @param  null|int  $offset  Offset of first result. Deprecated, use `linked_partitioning` instead.
     * @param  null|bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function __construct(
        protected ?string $q = null,
        protected ?array $access = null,
        protected ?bool $showTracks = null,
        protected ?int $limit = null,
        protected ?int $offset = null,
        protected ?bool $linkedPartitioning = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'q' => $this->q,
            'access' => $this->access,
            'show_tracks' => $this->showTracks,
            'limit' => $this->limit,
            'offset' => $this->offset,
            'linked_partitioning' => $this->linkedPartitioning,
        ]);
    }
}
