<?php

namespace Janyk\Soundcloud\Requests\Tracks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Track favoriters
 */
class TrackFavoriters extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/tracks/{$this->trackId}/favoriters";
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     * @param  null|int  $limit  Number of results to return in the collection.
     * @param  null|bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function __construct(
        protected int $trackId,
        protected ?int $limit = null,
        protected ?bool $linkedPartitioning = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['limit' => $this->limit, 'linked_partitioning' => $this->linkedPartitioning]);
    }
}
