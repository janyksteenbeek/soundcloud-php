<?php

namespace Janyk\Soundcloud;

use Saloon\Http\Connector;

abstract class Resource
{
    public function __construct(
        protected Connector $connector,
    ) {}
}
