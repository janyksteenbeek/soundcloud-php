<?php

namespace Janyk\Soundcloud\Requests\Me;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * User playlists
 *
 * Returns playlist info, playlist tracks and tracks owner info.
 */
class UserPlaylists extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/me/playlists';
    }

    /**
     * @param  null|bool  $showTracks  A boolean flag to request a playlist with or without tracks. Default is `true`.
     * @param  null|bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     * @param  null|int  $limit  Number of results to return in the collection.
     */
    public function __construct(
        protected ?bool $showTracks = null,
        protected ?bool $linkedPartitioning = null,
        protected ?int $limit = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['show_tracks' => $this->showTracks, 'linked_partitioning' => $this->linkedPartitioning, 'limit' => $this->limit]);
    }
}
