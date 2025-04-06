<?php

namespace Janyk\Soundcloud\Resource;

use Janyk\Soundcloud\Requests\Me\FollowingsRecentTracks;
use Janyk\Soundcloud\Requests\Me\FollowUser;
use Janyk\Soundcloud\Requests\Me\GetFollowerDeprecated;
use Janyk\Soundcloud\Requests\Me\GetFollowingDeprecated;
use Janyk\Soundcloud\Requests\Me\RecentUserActivities;
use Janyk\Soundcloud\Requests\Me\UnfollowUser;
use Janyk\Soundcloud\Requests\Me\UserActivities;
use Janyk\Soundcloud\Requests\Me\UserFollowers;
use Janyk\Soundcloud\Requests\Me\UserFollowings;
use Janyk\Soundcloud\Requests\Me\UserInfo;
use Janyk\Soundcloud\Requests\Me\UserLikedPlaylists;
use Janyk\Soundcloud\Requests\Me\UserLikedTracks;
use Janyk\Soundcloud\Requests\Me\UserPlaylists;
use Janyk\Soundcloud\Requests\Me\UserTrackActivities;
use Janyk\Soundcloud\Requests\Me\UserTracks;
use Janyk\Soundcloud\Resource;
use Saloon\Http\Response;

class Me extends Resource
{
    public function userInfo(): Response
    {
        return $this->connector->send(new UserInfo);
    }

    /**
     * @param  array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  int  $limit  Number of results to return in the collection.
     */
    public function userActivities(?array $access, ?int $limit): Response
    {
        return $this->connector->send(new UserActivities($access, $limit));
    }

    /**
     * @param  array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  int  $limit  Number of results to return in the collection.
     */
    public function recentUserActivities(?array $access, ?int $limit): Response
    {
        return $this->connector->send(new RecentUserActivities($access, $limit));
    }

    /**
     * @param  array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  int  $limit  Number of results to return in the collection.
     */
    public function userTrackActivities(?array $access, ?int $limit): Response
    {
        return $this->connector->send(new UserTrackActivities($access, $limit));
    }

    /**
     * @param  int  $limit  Number of results to return in the collection.
     * @param  array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function userLikedTracks(?int $limit, ?array $access, ?bool $linkedPartitioning): Response
    {
        return $this->connector->send(new UserLikedTracks($limit, $access, $linkedPartitioning));
    }

    /**
     * @param  int  $limit  Number of results to return in the collection.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function userLikedPlaylists(?int $limit, ?bool $linkedPartitioning): Response
    {
        return $this->connector->send(new UserLikedPlaylists($limit, $linkedPartitioning));
    }

    /**
     * @param  int  $limit  Number of results to return in the collection.
     * @param  int  $offset  Offset of first result. Deprecated, use `linked_partitioning` instead.
     */
    public function userFollowings(?int $limit, ?int $offset): Response
    {
        return $this->connector->send(new UserFollowings($limit, $offset));
    }

    /**
     * @param  array  $access  Filters content by level of access the user (logged in or anonymous) has to the track. The result list will include only tracks with the specified access. Include all options if you'd like to see all possible tracks. See `Track#access` schema for more details.
     * @param  int  $limit  Number of results to return in the collection.
     * @param  int  $offset  Offset of first result. Deprecated, use `linked_partitioning` instead.
     */
    public function followingsRecentTracks(?array $access, ?int $limit, ?int $offset): Response
    {
        return $this->connector->send(new FollowingsRecentTracks($access, $limit, $offset));
    }

    /**
     * @param  int  $userId  SoundCloud User id
     */
    public function getFollowingDeprecated(int $userId): Response
    {
        return $this->connector->send(new GetFollowingDeprecated($userId));
    }

    /**
     * @param  int  $userId  SoundCloud User id
     */
    public function followUser(int $userId): Response
    {
        return $this->connector->send(new FollowUser($userId));
    }

    /**
     * @param  int  $userId  SoundCloud User id
     */
    public function unfollowUser(int $userId): Response
    {
        return $this->connector->send(new UnfollowUser($userId));
    }

    /**
     * @param  int  $limit  Number of results to return in the collection.
     */
    public function userFollowers(?int $limit): Response
    {
        return $this->connector->send(new UserFollowers($limit));
    }

    /**
     * @param  int  $followerId  SoundCloud User id to denote a Follower
     */
    public function getFollowerDeprecated(int $followerId): Response
    {
        return $this->connector->send(new GetFollowerDeprecated($followerId));
    }

    /**
     * @param  bool  $showTracks  A boolean flag to request a playlist with or without tracks. Default is `true`.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     * @param  int  $limit  Number of results to return in the collection.
     */
    public function userPlaylists(?bool $showTracks, ?bool $linkedPartitioning, ?int $limit): Response
    {
        return $this->connector->send(new UserPlaylists($showTracks, $linkedPartitioning, $limit));
    }

    /**
     * @param  int  $limit  Number of results to return in the collection.
     * @param  bool  $linkedPartitioning  Returns paginated collection of items (recommended, returning a list without pagination is deprecated and should not be used)
     */
    public function userTracks(?int $limit, ?bool $linkedPartitioning): Response
    {
        return $this->connector->send(new UserTracks($limit, $linkedPartitioning));
    }
}
