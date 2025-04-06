<?php

namespace Janyk\Soundcloud\Requests\Search;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Search users
 */
class SearchUsers extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/users';
    }

    /**
     * @param  null|string  $q  search
     * @param  null|string  $ids  A comma separated list of track ids to filter on
     * @param  null|int  $limit  Number of results to return in the collection.
     * @param  null|int  $offset  Offset of first result. Deprecated, use `linked_partitioning` instead.
     * @param  null|bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function __construct(
        protected ?string $q = null,
        protected ?string $ids = null,
        protected ?int $limit = null,
        protected ?int $offset = null,
        protected ?bool $linkedPartitioning = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'q' => $this->q,
            'ids' => $this->ids,
            'limit' => $this->limit,
            'offset' => $this->offset,
            'linked_partitioning' => $this->linkedPartitioning,
        ]);
    }
}
