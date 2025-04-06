<?php

namespace Janyk\Soundcloud\Requests\Tracks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Track reposters
 */
class TrackReposters extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/tracks/{$this->trackId}/reposters";
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     * @param  null|int  $limit  Number of results to return in the collection.
     */
    public function __construct(
        protected int $trackId,
        protected ?int $limit = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['limit' => $this->limit]);
    }
}
