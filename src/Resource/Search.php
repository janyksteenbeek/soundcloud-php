<?php

namespace Janyk\Soundcloud\Resource;

use Janyk\Soundcloud\Requests\Search\SearchPlaylists;
use Janyk\Soundcloud\Requests\Search\SearchTracks;
use Janyk\Soundcloud\Requests\Search\SearchUsers;
use Janyk\Soundcloud\Resource;
use Saloon\Http\Response;

class Search extends Resource
{
    /**
     * @param  string  $q  search
     * @param  string  $ids  A comma separated list of track ids to filter on
     * @param  string  $genres  A comma separated list of genres
     * @param  string  $tags  A comma separated list of tags
     * @param  array  $bpm  Return tracks with a specified bpm[from], bpm[to]
     * @param  array  $duration  Return tracks within a specified duration range
     * @param  array  $createdAt  (yyyy-mm-dd hh:mm:ss) return tracks created within the specified dates
     * @param  array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  int  $limit  Number of results to return in the collection.
     * @param  int  $offset  Offset of first result. Deprecated, use `linked_partitioning` instead.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function searchTracks(
        ?string $q,
        ?string $ids,
        ?string $genres,
        ?string $tags,
        ?array $bpm,
        ?array $duration,
        ?array $createdAt,
        ?array $access,
        ?int $limit,
        ?int $offset,
        ?bool $linkedPartitioning,
    ): Response {
        return $this->connector->send(new SearchTracks($q, $ids, $genres, $tags, $bpm, $duration, $createdAt, $access, $limit, $offset, $linkedPartitioning));
    }

    /**
     * @param  string  $q  search
     * @param  array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  bool  $showTracks  A boolean flag to request a playlist with or without tracks. Default is `true`.
     * @param  int  $limit  Number of results to return in the collection.
     * @param  int  $offset  Offset of first result. Deprecated, use `linked_partitioning` instead.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function searchPlaylists(
        ?string $q,
        ?array $access,
        ?bool $showTracks,
        ?int $limit,
        ?int $offset,
        ?bool $linkedPartitioning,
    ): Response {
        return $this->connector->send(new SearchPlaylists($q, $access, $showTracks, $limit, $offset, $linkedPartitioning));
    }

    /**
     * @param  string  $q  search
     * @param  string  $ids  A comma separated list of track ids to filter on
     * @param  int  $limit  Number of results to return in the collection.
     * @param  int  $offset  Offset of first result. Deprecated, use `linked_partitioning` instead.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function searchUsers(?string $q, ?string $ids, ?int $limit, ?int $offset, ?bool $linkedPartitioning): Response
    {
        return $this->connector->send(new SearchUsers($q, $ids, $limit, $offset, $linkedPartitioning));
    }
}
