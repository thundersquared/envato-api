<?php

namespace sqrd\Envato;

use \GuzzleHttp\Client;

class API {
  private $token = null;
  private $userAgent = null;

  function __construct($token = null, $userAgent = null)
  {
    if (!is_null($token)) {
      $this->token = $token;
    }

    if (!is_null($userAgent)) {
      $this->userAgent = $userAgent;
    }
  }

  public function setToken($token = null, $userAgent = null)
  {
    return new API($token, $userAgent);
  }

  protected function makeRequest($path = '', $args = null)
  {
    $uri = 'https://api.envato.com' . $path;
    $options = [
      'headers' => [
        'User-Agent'    => $this->userAgent || 'envato-api/0.1',
        'Authorization' => 'Bearer ' . $this->token
      ]
    ];

    if (!is_null($options) && count($options)) {
      $options['query'] = $args;
    }

    $client = new Client();
    $res = $client->request('GET', $uri, $options);
    return $res->getBody();
  }

  public function getCategories($site)
  {
    return $this->makeRequest("/v1/market/categories:$site.json");
  }
}
