<?php

namespace Yosmy\Payment\Card\Iannuttall;

use Yosmy\Http;
use LogicException;

/**
 * @di\service()
 */
class DownloadData
{
    /**
     * @var string
     */
    private $dir;

    /**
     * @var Http\ExecuteRequest
     */
    private $executeRequest;

    /**
     * @di\arguments({
     *     dir: '%cache_dir%'
     * })
     *
     * @param string $dir
     * @param Http\ExecuteRequest $executeRequest
     */
    public function __construct(
        string $dir,
        Http\ExecuteRequest $executeRequest
    ) {
        $this->dir = $dir;
        $this->executeRequest = $executeRequest;
    }

    /**
     */
    public function download()
    {
        try {
            $data = $this->executeRequest->execute(
                Http\ExecuteRequest::METHOD_GET,
                'https://raw.githubusercontent.com/iannuttall/binlist-data/master/binlist-data.csv',
                []
            );
        } catch (Http\Exception $e) {
            throw new LogicException($e->getResponse(), null, $e);
        }

        file_put_contents(
            sprintf('%s/binlist-data.csv', $this->dir),
            $data->getRawBody()
        );
    }
}