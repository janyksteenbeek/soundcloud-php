<?php

namespace Janyk\Soundcloud\Requests\Tracks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get track
 */
class GetTrack extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/tracks/{$this->trackId}";
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     * @param  null|string  $secretToken  A secret token to fetch private playlists/tracks
     */
    public function __construct(
        protected int $trackId,
        protected ?string $secretToken = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['secret_token' => $this->secretToken]);
    }
}
