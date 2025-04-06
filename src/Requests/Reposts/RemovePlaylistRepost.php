<?php

namespace Janyk\Soundcloud\Requests\Reposts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Remove playlist repost
 */
class RemovePlaylistRepost extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/reposts/playlists/{$this->playlistId}";
    }

    /**
     * @param  int  $playlistId  SoundCloud playlist id
     */
    public function __construct(
        protected int $playlistId,
    ) {}
}
