<?php

namespace Yosmy\Payment\Card;

class Lookup
{
    /**
     * @var string
     */
    private $country;

    /**
     * @param string $country
     */
    public function __construct(string $country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }
}