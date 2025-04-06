<?php

namespace Janyk\Soundcloud\Resource;

use Janyk\Soundcloud\Requests\Playlists\CreatePlaylist;
use Janyk\Soundcloud\Requests\Playlists\DeletePlaylist;
use Janyk\Soundcloud\Requests\Playlists\GetPlaylist;
use Janyk\Soundcloud\Requests\Playlists\PlaylistReposters;
use Janyk\Soundcloud\Requests\Playlists\PlaylistTracks;
use Janyk\Soundcloud\Requests\Playlists\UpdatePlaylist;
use Janyk\Soundcloud\Resource;
use Saloon\Http\Response;

class Playlists extends Resource
{
    public function createPlaylist(): Response
    {
        return $this->connector->send(new CreatePlaylist);
    }

    /**
     * @param  int  $playlistId  SoundCloud playlist id
     * @param  string  $secretToken  A secret token to fetch private playlists/tracks
     * @param  array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  bool  $showTracks  A boolean flag to request a playlist with or without tracks. Default is `true`.
     */
    public function getPlaylist(int $playlistId, ?string $secretToken, ?array $access, ?bool $showTracks): Response
    {
        return $this->connector->send(new GetPlaylist($playlistId, $secretToken, $access, $showTracks));
    }

    /**
     * @param  int  $playlistId  SoundCloud playlist id
     */
    public function updatePlaylist(int $playlistId): Response
    {
        return $this->connector->send(new UpdatePlaylist($playlistId));
    }

    /**
     * @param  int  $playlistId  SoundCloud playlist id
     */
    public function deletePlaylist(int $playlistId): Response
    {
        return $this->connector->send(new DeletePlaylist($playlistId));
    }

    /**
     * @param  int  $playlistId  SoundCloud playlist id
     * @param  string  $secretToken  A secret token to fetch private playlists/tracks
     * @param  array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function playlistTracks(
        int $playlistId,
        ?string $secretToken,
        ?array $access,
        ?bool $linkedPartitioning,
    ): Response {
        return $this->connector->send(new PlaylistTracks($playlistId, $secretToken, $access, $linkedPartitioning));
    }

    /**
     * @param  int  $playlistId  SoundCloud playlist id
     * @param  int  $limit  Number of results to return in the collection.
     */
    public function playlistReposters(int $playlistId, ?int $limit): Response
    {
        return $this->connector->send(new PlaylistReposters($playlistId, $limit));
    }
}
