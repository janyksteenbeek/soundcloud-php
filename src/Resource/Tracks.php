<?php

namespace Janyk\Soundcloud\Resource;

use Janyk\Soundcloud\Requests\Tracks\CreateComment;
use Janyk\Soundcloud\Requests\Tracks\DeleteTrack;
use Janyk\Soundcloud\Requests\Tracks\GetTrack;
use Janyk\Soundcloud\Requests\Tracks\GetTrackComments;
use Janyk\Soundcloud\Requests\Tracks\GetTrackPlaylists;
use Janyk\Soundcloud\Requests\Tracks\RelatedTracks;
use Janyk\Soundcloud\Requests\Tracks\TrackFavoriters;
use Janyk\Soundcloud\Requests\Tracks\TrackReposters;
use Janyk\Soundcloud\Requests\Tracks\TrackStreams;
use Janyk\Soundcloud\Requests\Tracks\UpdateTrack;
use Janyk\Soundcloud\Requests\Tracks\UploadTrack;
use Janyk\Soundcloud\Resource;
use Saloon\Http\Response;

class Tracks extends Resource
{
    public function uploadTrack(): Response
    {
        return $this->connector->send(new UploadTrack);
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     * @param  string  $secretToken  A secret token to fetch private playlists/tracks
     */
    public function getTrack(int $trackId, ?string $secretToken): Response
    {
        return $this->connector->send(new GetTrack($trackId, $secretToken));
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     */
    public function updateTrack(int $trackId): Response
    {
        return $this->connector->send(new UpdateTrack($trackId));
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     */
    public function deleteTrack(int $trackId): Response
    {
        return $this->connector->send(new DeleteTrack($trackId));
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     * @param  string  $secretToken  A secret token to fetch private playlists/tracks
     */
    public function trackStreams(int $trackId, ?string $secretToken): Response
    {
        return $this->connector->send(new TrackStreams($trackId, $secretToken));
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     * @param  int  $limit  Number of results to return in the collection.
     * @param  int  $offset  Offset of first result. Deprecated, use `linked_partitioning` instead.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function getTrackComments(int $trackId, ?int $limit, ?int $offset, ?bool $linkedPartitioning): Response
    {
        return $this->connector->send(new GetTrackComments($trackId, $limit, $offset, $linkedPartitioning));
    }



    /**
     * @param  int  $trackId  SoundCloud Track id
     * @param  int  $limit  Number of results to return in the collection.
     * @param  int  $offset  Offset of first result. Deprecated, use `linked_partitioning` instead.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function getTrackPlaylists(int $trackId, ?int $limit, ?int $offset, ?bool $linkedPartitioning): Response
    {
        return $this->connector->send(new GetTrackPlaylists($trackId, $limit, $offset, $linkedPartitioning));
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     */
    public function createComment(int $trackId): Response
    {
        return $this->connector->send(new CreateComment($trackId));
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     * @param  int  $limit  Number of results to return in the collection.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function trackFavoriters(int $trackId, ?int $limit, ?bool $linkedPartitioning): Response
    {
        return $this->connector->send(new TrackFavoriters($trackId, $limit, $linkedPartitioning));
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     * @param  int  $limit  Number of results to return in the collection.
     */
    public function trackReposters(int $trackId, ?int $limit): Response
    {
        return $this->connector->send(new TrackReposters($trackId, $limit));
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     * @param  array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  int  $limit  Number of results to return in the collection.
     * @param  int  $offset  Offset of first result. Deprecated, use `linked_partitioning` instead.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function relatedTracks(
        int $trackId,
        ?array $access,
        ?int $limit,
        ?int $offset,
        ?bool $linkedPartitioning,
    ): Response {
        return $this->connector->send(new RelatedTracks($trackId, $access, $limit, $offset, $linkedPartitioning));
    }
}
