<?php

namespace Yosmy\Payment\Card\Play\Iannuttall;

use Yosmy\Payment\Card;

/**
 * @di\service()
 */
class ResolveLookup
{
    /**
     * @var Card\ResolveLookup
     */
    private $resolveLookup;

    /**
     * @param Card\ResolveLookup $resolveLookup
     */
    public function __construct(Card\ResolveLookup $resolveLookup)
    {
        $this->resolveLookup = $resolveLookup;
    }

    /**
     * @cli\resolution({command: "/iannuttall/resolve-lookup"})
     *
     * @param string $digits
     */
    public function load(
        string $digits
    ) {
        $this->resolveLookup->resolve($digits);
    }
}
