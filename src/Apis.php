<?php

declare(strict_types=1);

final class Apis
{
    private $apis;

    private function __construct(string $apis)
    {
        $this->ensureIsValidApis($apis);

        $this->apis = $apis;
    }

   
}