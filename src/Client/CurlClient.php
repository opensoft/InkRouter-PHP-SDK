<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Client;

use InkRouter\Exceptions\InkRouterNotAvailableException;
use InkRouter\Exceptions\ProcessingException;
use InkRouter\Response\CurlResponse;

/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.com>
 */
class CurlClient implements HttpClientInterface
{
    /**
     * @param string $url
     * @param string $httpMethod
     * @param array $headers
     * @param null $body
     * @return CurlResponse
     */
    public function send(string $url, string $httpMethod, array $headers = [],  string $body = null)
    {
        $curlResource = curl_init();
        if ($body !== null) {
            switch ($httpMethod) {
                case 'POST':
                    curl_setopt($curlResource, CURLOPT_POSTFIELDS, $body);
                    break;
                case 'PUT':
                    $fp = fopen('php://temp/maxmemory:256000', 'w');
                    fwrite($fp, $body);
                    fseek($fp, 0);
                    curl_setopt($curlResource, CURLOPT_BINARYTRANSFER, true);
                    curl_setopt($curlResource, CURLOPT_PUT, true);
                    curl_setopt($curlResource, CURLOPT_INFILE, $fp);
                    curl_setopt($curlResource, CURLOPT_INFILESIZE, strlen($body));
                    break;
                case 'DELETE':
                    curl_setopt($curlResource, CURLOPT_CUSTOMREQUEST, 'DELETE');
                    break;
            }
        }
        curl_setopt($curlResource, CURLOPT_URL, $url);
        curl_setopt($curlResource, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curlResource, CURLOPT_RETURNTRANSFER, true);
        $responseMessage = curl_exec($curlResource);
        if ($responseMessage === false) {
            throw new InkRouterNotAvailableException();
        }

        $statusCode = curl_getinfo($curlResource, CURLINFO_HTTP_CODE);

        $decodedResponse = json_decode($responseMessage, true);
        if ($decodedResponse === null) {
            throw new InkRouterNotAvailableException();
        }

        return new CurlResponse($decodedResponse, $statusCode);
    }
}
