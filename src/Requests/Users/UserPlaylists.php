<?php

namespace Janyk\Soundcloud\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * User playlists
 */
class UserPlaylists extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->userId}/playlists";
    }

    /**
     * @param  int  $userId  SoundCloud User id
     * @param  null|array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  null|bool  $showTracks  A boolean flag to request a playlist with or without tracks. Default is `true`.
     * @param  null|int  $limit  Number of results to return in the collection.
     * @param  null|bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function __construct(
        protected int $userId,
        protected ?array $access = null,
        protected ?bool $showTracks = null,
        protected ?int $limit = null,
        protected ?bool $linkedPartitioning = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'access' => $this->access,
            'show_tracks' => $this->showTracks,
            'limit' => $this->limit,
            'linked_partitioning' => $this->linkedPartitioning,
        ]);
    }
}
