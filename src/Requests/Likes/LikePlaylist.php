<?php

namespace Janyk\Soundcloud\Requests\Likes;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Like playlist
 */
class LikePlaylist extends Request
{
    use HasJsonBody;

    protected Method $method = Method::POST;

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
