<?php

namespace Janyk\Soundcloud\Requests\Playlists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Playlist tracks
 */
class PlaylistTracks extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/playlists/{$this->playlistId}/tracks";
    }

    /**
     * @param  int  $playlistId  SoundCloud playlist id
     * @param  null|string  $secretToken  A secret token to fetch private playlists/tracks
     * @param  null|array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  null|bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function __construct(
        protected int $playlistId,
        protected ?string $secretToken = null,
        protected ?array $access = null,
        protected ?bool $linkedPartitioning = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['secret_token' => $this->secretToken, 'access' => $this->access, 'linked_partitioning' => $this->linkedPartitioning]);
    }
}
