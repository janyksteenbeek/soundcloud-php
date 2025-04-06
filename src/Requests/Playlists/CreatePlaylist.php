<?php

namespace Janyk\Soundcloud\Requests\Playlists;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create playlist
 */
class CreatePlaylist extends Request
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/playlists';
    }

    public function __construct() {}
}
