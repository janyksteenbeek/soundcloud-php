<?php

namespace Janyk\Soundcloud\Requests\Likes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Unlike track
 */
class UnlikeTrack extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/likes/tracks/{$this->trackId}";
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     */
    public function __construct(
        protected int $trackId,
    ) {}
}
