<?php
namespace Redwood\Client;

class CoreApi extends DefaultApi
{
  /**
   * Create request for operation 'refreshTokenGet'
   * @throws \InvalidArgumentException
   * @return \GuzzleHttp\Psr7\Request
   */
  protected function refreshTokenGetRequest()
  {
    // this endpoint requires OAuth (access token)
    if ($this->config->getAccessToken() !== null) {
      $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
    }

    $defaultHeaders = [];
    if ($this->config->getUserAgent()) {
      $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
    }

    $headers = array_merge(
      $defaultHeaders,
      $headerParams,
      $headers
    );

    $host = null;
    if (!parse_url($this->config->getHost(), $host)) {
      throw new \InvalidArgumentException("Invalid host info in configuration");
    }

    $query = \GuzzleHttp\Psr7\build_query($queryParams);

    return new Request(
      'GET',
      $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
      $headers,
      $httpBody
    );
  }


  function refreshTokenGet()
  {
    $request = $this->refreshTokenGetRequest();

    try {
      $options = $this->createHttpClientOption();
      try {
        $response = $this->client->send($request, $options);
      } catch (RequestException $e) {
        throw new ApiException(
          "[{$e->getCode()}] {$e->getMessage()}",
          $e->getCode(),
          $e->getResponse() ? $e->getResponse()->getHeaders() : null,
          $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
        );
      }

      $statusCode = $response->getStatusCode();

      if ($statusCode < 200 || $statusCode > 299) {
        throw new ApiException(
          sprintf(
            '[%d] Error connecting to the API (%s)',
            $statusCode,
            $request->getUri()
          ),
          $statusCode,
          $response->getHeaders(),
          $response->getBody()
        );
      }

      $responseBody = $response->getBody();
      if ($returnType === '\SplFileObject') {
        $content = $responseBody; //stream goes to serializer
      } else {
        $content = $responseBody->getContents();
        if (!in_array($returnType, ['string','integer','bool'])) {
          $content = json_decode($content);
        }
      }

      return [
        ObjectSerializer::deserialize($content, $returnType, []),
        $response->getStatusCode(),
        $response->getHeaders()
      ];

    } catch (ApiException $e) {
      switch ($e->getCode()) {
        case 200:
          $data = ObjectSerializer::deserialize(
            $e->getResponseBody(),
            '\Redwood\Models\User',
            $e->getResponseHeaders()
          );
          $e->setResponseObject($data);
          break;
        case 401:
          $data = ObjectSerializer::deserialize(
            $e->getResponseBody(),
            'object',
            $e->getResponseHeaders()
          );
          $e->setResponseObject($data);
          break;
        case 403:
          $data = ObjectSerializer::deserialize(
            $e->getResponseBody(),
            'object',
            $e->getResponseHeaders()
          );
          $e->setResponseObject($data);
          break;
      }
      throw $e;
    }
  }
}