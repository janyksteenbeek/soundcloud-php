<?php

namespace Janyk\Soundcloud\Requests\Likes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Unlike playlist
 */
class UnlikePlaylist extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/likes/playlists/{$this->playlistId}";
    }

    /**
     * @param  int  $playlistId  SoundCloud playlist id
     */
    public function __construct(
        protected int $playlistId,
    ) {}
}
