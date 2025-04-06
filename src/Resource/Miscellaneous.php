<?php

namespace Janyk\Soundcloud\Resource;

use Janyk\Soundcloud\Requests\Miscellaneous\ResolveUrl;
use Janyk\Soundcloud\Resource;
use Saloon\Http\Response;

class Miscellaneous extends Resource
{
    /**
     * @param  string  $url  SoundCloud URL
     */
    public function resolveUrl(string $url): Response
    {
        return $this->connector->send(new ResolveUrl($url));
    }
}
