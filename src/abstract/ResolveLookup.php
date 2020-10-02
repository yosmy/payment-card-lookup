<?php

namespace Yosmy\Payment\Card;

use Yosmy;

interface ResolveLookup
{
    /**
     * @param string $digits
     *
     * @return Lookup
     *
     * @throws UnresolvableLookupException
     */
    public function resolve(
        string $digits
    ): Lookup;
}