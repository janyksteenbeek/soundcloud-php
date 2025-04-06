<?php

namespace Janyk\Soundcloud\Resource;

use Janyk\Soundcloud\Requests\Reposts\RemovePlaylistRepost;
use Janyk\Soundcloud\Requests\Reposts\RemoveTrackRepost;
use Janyk\Soundcloud\Requests\Reposts\RepostPlaylist;
use Janyk\Soundcloud\Requests\Reposts\RepostTrack;
use Janyk\Soundcloud\Resource;
use Saloon\Http\Response;

class Reposts extends Resource
{
    /**
     * @param  int  $trackId  SoundCloud Track id
     */
    public function repostTrack(int $trackId): Response
    {
        return $this->connector->send(new RepostTrack($trackId));
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     */
    public function removeTrackRepost(int $trackId): Response
    {
        return $this->connector->send(new RemoveTrackRepost($trackId));
    }

    /**
     * @param  int  $playlistId  SoundCloud playlist id
     */
    public function repostPlaylist(int $playlistId): Response
    {
        return $this->connector->send(new RepostPlaylist($playlistId));
    }

    /**
     * @param  int  $playlistId  SoundCloud playlist id
     */
    public function removePlaylistRepost(int $playlistId): Response
    {
        return $this->connector->send(new RemovePlaylistRepost($playlistId));
    }
}
