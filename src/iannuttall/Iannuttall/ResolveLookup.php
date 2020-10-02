<?php

namespace Yosmy\Payment\Card\Iannuttall;

use Yosmy\Payment\Card;

/**
 * @di\service()
 */
class ResolveLookup implements Card\ResolveLookup
{
    /**
     * @var string
     */
    private $dir;

    /**
     * @di\arguments({
     *     dir: '%cache_dir%'
     * })
     *
     * @param string $dir
     */
    public function __construct(
        string $dir
    ) {
        $this->dir = $dir;
    }

    /**
     * {@inheritDoc}
     */
    public function resolve(string $digits): Card\Lookup
    {
        $handle = fopen(sprintf('%s/binlist-data.csv', $this->dir), "r");

        while (($data = fgetcsv($handle, 1000)) !== FALSE) {
            if (strpos($digits, $data[0]) === false) {
                continue;
            }

            fclose($handle);

            if (!isset($data[5]) || !$data[5]) {
                throw new Card\UnresolvableLookupException();
            }

            return new Card\Lookup(
                $data[5]
            );
        }

        throw new Card\UnresolvableLookupException();
    }
}