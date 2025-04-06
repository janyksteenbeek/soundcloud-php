<?php

namespace Janyk\Soundcloud\Requests\Playlists;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete playlist
 */
class DeletePlaylist extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/playlists/{$this->playlistId}";
    }

    /**
     * @param  int  $playlistId  SoundCloud playlist id
     */
    public function __construct(
        protected int $playlistId,
    ) {}
}
