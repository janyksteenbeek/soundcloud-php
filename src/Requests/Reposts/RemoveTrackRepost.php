<?php

namespace Janyk\Soundcloud\Requests\Reposts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Remove track repost
 */
class RemoveTrackRepost extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/reposts/tracks/{$this->trackId}";
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     */
    public function __construct(
        protected int $trackId,
    ) {}
}
