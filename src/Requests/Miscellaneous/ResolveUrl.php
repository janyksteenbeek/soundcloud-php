<?php

namespace Janyk\Soundcloud\Requests\Miscellaneous;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Resolve URL
 */
class ResolveUrl extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/resolve';
    }

    /**
     * @param  string  $url  SoundCloud URL
     */
    public function __construct(
        protected string $url,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['url' => $this->url]);
    }
}
