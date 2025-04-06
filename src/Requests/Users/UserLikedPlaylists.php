<?php

namespace Janyk\Soundcloud\Requests\Users;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * User liked playlists
 */
class UserLikedPlaylists extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->userId}/likes/playlists";
    }

    /**
     * @param  int  $userId  SoundCloud User id
     * @param  null|int  $limit  Number of results to return in the collection.
     * @param  null|bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function __construct(
        protected int $userId,
        protected ?int $limit = null,
        protected ?bool $linkedPartitioning = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['limit' => $this->limit, 'linked_partitioning' => $this->linkedPartitioning]);
    }
}
