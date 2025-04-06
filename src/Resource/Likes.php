<?php

namespace Janyk\Soundcloud\Resource;

use Janyk\Soundcloud\Requests\Likes\LikePlaylist;
use Janyk\Soundcloud\Requests\Likes\LikeTrack;
use Janyk\Soundcloud\Requests\Likes\UnlikePlaylist;
use Janyk\Soundcloud\Requests\Likes\UnlikeTrack;
use Janyk\Soundcloud\Resource;
use Saloon\Http\Response;

class Likes extends Resource
{
    /**
     * @param  int  $trackId  SoundCloud Track id
     */
    public function likeTrack(int $trackId): Response
    {
        return $this->connector->send(new LikeTrack($trackId));
    }

    /**
     * @param  int  $trackId  SoundCloud Track id
     */
    public function unlikeTrack(int $trackId): Response
    {
        return $this->connector->send(new UnlikeTrack($trackId));
    }

    /**
     * @param  int  $playlistId  SoundCloud playlist id
     */
    public function likePlaylist(int $playlistId): Response
    {
        return $this->connector->send(new LikePlaylist($playlistId));
    }

    /**
     * @param  int  $playlistId  SoundCloud playlist id
     */
    public function unlikePlaylist(int $playlistId): Response
    {
        return $this->connector->send(new UnlikePlaylist($playlistId));
    }
}
