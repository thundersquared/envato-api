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
        'Accept'        => 'application/json',
        'Authorization' => 'Bearer ' . $this->token,
        'User-Agent'    => $this->userAgent || 'sqrd/envato-api/1.0.0'
      ]
    ];

    if (!is_null($options) && count($options)) {
      $options['query'] = $args;
    }

    $client = new Client();
    $request = $client->request('GET', $uri, $options);
    $response = $request->getBody();
    $result = json_decode($response, true);

    return $result;
  }

  /**
   * Envato Market Catalog
   **/

  public function getCollection($args = null)
  {
    return $this->makeRequest('/v3/market/catalog/collection', $args);
  }

  public function getItem($args = null)
  {
    return $this->makeRequest('/v3/market/catalog/item', $args);
  }

  public function searchItems($args = null)
  {
    return $this->makeRequest('/v1/discovery/search/search/item', $args);
  }

  public function searchComments($args = null)
  {
    return $this->makeRequest('/v1/discovery/search/search/comment', $args);
  }

  public function getPopularItems($site, $args = null)
  {
    return $this->makeRequest("/v1/market/popular:$site.json", $args);
  }

  public function getCategories($site, $args = null)
  {
    return $this->makeRequest("/v1/market/categories:$site.json", $args);
  }

  public function getItemPrices($site, $args = null)
  {
    return $this->makeRequest("/v1/market/item-prices:$site.json", $args);
  }

  public function getNewItems($site, $category, $args = null)
  {
    return $this->makeRequest("/v1/market/new-files:$site,$category.json", $args);
  }

  public function getFeaturedItems($site, $args = null)
  {
    return $this->makeRequest("/v1/market/new-files:$site.json", $args);
  }

  public function getRandomNewFiles($site, $args = null)
  {
    return $this->makeRequest("/v1/market/random-new-files:$site.json", $args);
  }

  /**
   * User Details
   **/

  public function getUserCollections($args = null)
  {
    return $this->makeRequest('/v3/market/user/collections', $args);
  }

  public function getPrivateCollection($args = null)
  {
    return $this->makeRequest('/v3/market/user/collection', $args);
  }

  public function getUsersDetails($username, $args = null)
  {
    return $this->makeRequest("/v1/market/user:$username.json", $args);
  }

  public function getUsersBadges($username, $args = null)
  {
    return $this->makeRequest("/v1/market/user-badges:$username.json");
  }

  public function getUsersItems($username, $args = null)
  {
    return $this->makeRequest("/v1/market/user-items-by-site:$username.json", $args);
  }

  public function getUsersNewItems($username, $site, $args = null)
  {
    return $this->makeRequest("/v1/market/new-files-from-user:$username,$site.json", $args);
  }

  /**
   * Private User Details
   **/

  public function getSales($args = null)
  {
    return $this->makeRequest('/v3/market/author/sales', $args);
  }

  public function getSaleByCode($args = null)
  {
    return $this->makeRequest('/v3/market/author/sale', $args);
  }

  public function getPurchases($args = null)
  {
    return $this->makeRequest('/v3/market/buyer/list-purchases', $args);
  }

  public function getPurchaseByCode($args = null)
  {
    return $this->makeRequest('/v3/market/buyer/purchase', $args);
  }

  public function getPrivateUserDetails($args = null)
  {
    return $this->makeRequest('/v1/market/private/user/account.json', $args);
  }

  public function getUsername($args = null)
  {
    return $this->makeRequest('/v1/market/private/user/username.json');
  }

  public function getEmail($args = null)
  {
    return $this->makeRequest('/v1/market/private/user/email.json', $args);
  }

  public function getSalesByMonth($args = null)
  {
    return $this->makeRequest('/v1/market/private/user/earnings-and-sales-by-month.json', $args);
  }

  /**
   * Envato Market Stats
   **/

  public function getTotalMarketUsers($args = null)
  {
    return $this->makeRequest('/v1/market/total-users.json', $args);
  }

  public function getTotalMarketItems($args = null)
  {
    return $this->makeRequest('/v1/market/total-items.json', $args);
  }

  public function getTotalFilesBySite($site, $args = null)
  {
    return $this->makeRequest("/v1/market/number-of-files:$site.json", $args);
  }
}
