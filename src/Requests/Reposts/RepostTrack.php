<?php

namespace Janyk\Soundcloud\Requests\Reposts;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Repost track
 */
class RepostTrack extends Request
{
    use HasJsonBody;

    protected Method $method = Method::POST;

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
