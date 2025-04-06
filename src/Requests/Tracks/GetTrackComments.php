<?php

namespace Janyk\Soundcloud\Requests\Tracks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get track comments
 */
class GetTrackComments extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/tracks/{$this->trackId}/comments";
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     * @param  null|int  $limit  Number of results to return in the collection.
     * @param  null|int  $offset  Offset of first result. Deprecated, use `linked_partitioning` instead.
     * @param  null|bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function __construct(
        protected int $trackId,
        protected ?int $limit = null,
        protected ?int $offset = null,
        protected ?bool $linkedPartitioning = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['limit' => $this->limit, 'offset' => $this->offset, 'linked_partitioning' => $this->linkedPartitioning]);
    }
}
