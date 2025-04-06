<?php

namespace Janyk\Soundcloud\Requests\Likes;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Like track
 */
class LikeTrack extends Request
{
    use HasJsonBody;

    protected Method $method = Method::POST;

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
