<?php

namespace Janyk\Soundcloud;

use Janyk\Soundcloud\Resource\Likes;
use Janyk\Soundcloud\Resource\Me;
use Janyk\Soundcloud\Resource\Miscellaneous;
use Janyk\Soundcloud\Resource\Oauth;
use Janyk\Soundcloud\Resource\Playlists;
use Janyk\Soundcloud\Resource\Reposts;
use Janyk\Soundcloud\Resource\Search;
use Janyk\Soundcloud\Resource\Tracks;
use Janyk\Soundcloud\Resource\Users;
use Saloon\Http\Auth\QueryAuthenticator;
use Saloon\Http\Connector;

/**
 * SoundCloud Public API Specification
 *
 * Swagger json can be found [here](https://developers.soundcloud.com/docs/api/explorer/api.json)
 */
class Soundcloud extends Connector
{
    protected bool $internalMode = false;

    protected string $publicApiBaseUrl = 'https://api.soundcloud.com';

    protected string $internalApiBaseUrl = 'https://api-v2.soundcloud.com';

    public function resolveBaseUrl(): string
    {
        return $this->internalMode ? $this->internalApiBaseUrl : $this->publicApiBaseUrl;
    }

    /**
     * Enable internal mode, which uses api-v2.soundcloud.com
     * This allows for query authentication using only client_id
     *
     * @param  string  $clientId  Your SoundCloud client ID
     */
    public function enableInternalMode(string $clientId): self
    {
        $this->internalMode = true;
        $this->authenticate(new QueryAuthenticator('client_id', $clientId));

        return $this;
    }

    /**
     * Disable internal mode and use the public API URL
     */
    public function disableInternalMode(): self
    {
        $this->internalMode = false;

        return $this;
    }

    /**
     * Check if internal mode is enabled
     */
    public function isInternalModeEnabled(): bool
    {
        return $this->internalMode;
    }

    public function likes(): Likes
    {
        return new Likes($this);
    }

    public function me(): Me
    {
        return new Me($this);
    }

    public function miscellaneous(): Miscellaneous
    {
        return new Miscellaneous($this);
    }

    public function oauth(): Oauth
    {
        return new Oauth($this);
    }

    public function playlists(): Playlists
    {
        return new Playlists($this);
    }

    public function reposts(): Reposts
    {
        return new Reposts($this);
    }

    public function search(): Search
    {
        return new Search($this);
    }

    public function tracks(): Tracks
    {
        return new Tracks($this);
    }

    public function users(): Users
    {
        return new Users($this);
    }
}
