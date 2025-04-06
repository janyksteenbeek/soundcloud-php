<?php

namespace Janyk\Soundcloud\Resource;

use Janyk\Soundcloud\Requests\Users\GetFollowingDeprecated;
use Janyk\Soundcloud\Requests\Users\GetUser;
use Janyk\Soundcloud\Requests\Users\UserFavoritesDeprecated;
use Janyk\Soundcloud\Requests\Users\UserFollowers;
use Janyk\Soundcloud\Requests\Users\UserFollowings;
use Janyk\Soundcloud\Requests\Users\UserLikedPlaylists;
use Janyk\Soundcloud\Requests\Users\UserLikedTracks;
use Janyk\Soundcloud\Requests\Users\UserPlaylists;
use Janyk\Soundcloud\Requests\Users\UserTracks;
use Janyk\Soundcloud\Requests\Users\UserWebProfiles;
use Janyk\Soundcloud\Resource;
use Saloon\Http\Response;

class Users extends Resource
{
    /**
     * @param  int  $userId  SoundCloud User id
     */
    public function getUser(int $userId): Response
    {
        return $this->connector->send(new GetUser($userId));
    }

    /**
     * @param  int  $userId  SoundCloud User id
     * @param  int  $limit  Number of results to return in the collection.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function userFavoritesDeprecated(int $userId, ?int $limit, ?bool $linkedPartitioning): Response
    {
        return $this->connector->send(new UserFavoritesDeprecated($userId, $limit, $linkedPartitioning));
    }

    /**
     * @param  int  $userId  SoundCloud User id
     * @param  int  $limit  Number of results to return in the collection.
     */
    public function userFollowers(int $userId, ?int $limit): Response
    {
        return $this->connector->send(new UserFollowers($userId, $limit));
    }

    /**
     * @param  int  $userId  SoundCloud User id
     * @param  int  $limit  Number of results to return in the collection.
     */
    public function userFollowings(int $userId, ?int $limit): Response
    {
        return $this->connector->send(new UserFollowings($userId, $limit));
    }

    /**
     * @param  int  $userId  SoundCloud User id
     * @param  int  $followingId  SoundCloud User id to denote a Following of a user
     */
    public function getFollowingDeprecated(int $userId, int $followingId): Response
    {
        return $this->connector->send(new GetFollowingDeprecated($userId, $followingId));
    }

    /**
     * @param  int  $userId  SoundCloud User id
     * @param  array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  bool  $showTracks  A boolean flag to request a playlist with or without tracks. Default is `true`.
     * @param  int  $limit  Number of results to return in the collection.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function userPlaylists(
        int $userId,
        ?array $access,
        ?bool $showTracks,
        ?int $limit,
        ?bool $linkedPartitioning,
    ): Response {
        return $this->connector->send(new UserPlaylists($userId, $access, $showTracks, $limit, $linkedPartitioning));
    }

    /**
     * @param  int  $userId  SoundCloud User id
     * @param  array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  int  $limit  Number of results to return in the collection.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function userTracks(int $userId, ?array $access, ?int $limit, ?bool $linkedPartitioning): Response
    {
        return $this->connector->send(new UserTracks($userId, $access, $limit, $linkedPartitioning));
    }

    /**
     * @param  int  $userId  SoundCloud User id
     * @param  int  $limit  Number of results to return in the collection.
     */
    public function userWebProfiles(int $userId, ?int $limit): Response
    {
        return $this->connector->send(new UserWebProfiles($userId, $limit));
    }

    /**
     * @param  int  $userId  SoundCloud User id
     * @param  array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  int  $limit  Number of results to return in the collection.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function userLikedTracks(int $userId, ?array $access, ?int $limit, ?bool $linkedPartitioning): Response
    {
        return $this->connector->send(new UserLikedTracks($userId, $access, $limit, $linkedPartitioning));
    }

    /**
     * @param  int  $userId  SoundCloud User id
     * @param  int  $limit  Number of results to return in the collection.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function userLikedPlaylists(int $userId, ?int $limit, ?bool $linkedPartitioning): Response
    {
        return $this->connector->send(new UserLikedPlaylists($userId, $limit, $linkedPartitioning));
    }
}
