<?php

namespace Janyk\Soundcloud\Requests\Playlists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Playlist reposters
 */
class PlaylistReposters extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/playlists/{$this->playlistId}/reposters";
    }

    /**
     * @param  int  $playlistId  SoundCloud playlist id
     * @param  null|int  $limit  Number of results to return in the collection.
     */
    public function __construct(
        protected int $playlistId,
        protected ?int $limit = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['limit' => $this->limit]);
    }
}
