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
        'User-Agent'    => $this->userAgent || 'envato-api/0.1'
      ]
    ];

    if (!is_null($options) && count($options)) {
      $options['query'] = $args;
    }

    $client = new Client();
    $request = $client->request('GET', $uri, $options);
    return $request->getBody();
  }

  /**
   * Catalog endpoints
   **/

  public function getCollection($site, $args)
  {
    return $this->makeRequest('/v3/market/catalog/collection', $args);
  }

  public function getItem($site, $args)
  {
    return $this->makeRequest('/v3/market/catalog/item', $args);
  }

  public function searchItems($site, $args)
  {
    return $this->makeRequest('/v1/discovery/search/search/item', $args);
  }

  public function searchComments($site, $args)
  {
    return $this->makeRequest('/v1/discovery/search/search/comment', $args);
  }

  public function getPopularItems($site, $args)
  {
    return $this->makeRequest("/v1/market/popular:$site.json", $args);
  }

  public function getCategories($site, $args)
  {
    return $this->makeRequest("/v1/market/categories:$site.json");
  }

  public function getItemPrices($site, $args)
  {
    return $this->makeRequest("/v1/market/item-prices:$site.json");
  }

  public function getNewItems($site, $category, $args)
  {
    return $this->makeRequest("/v1/market/new-files:$site,$category.json");
  }

  public function getFeaturedItems($site, $args)
  {
    return $this->makeRequest("/v1/market/new-files:$site.json");
  }

  public function getRandomNewFiles($site, $args)
  {
    return $this->makeRequest("/v1/market/random-new-files:$site.json");
  }

  /**
   * User details
   **/

  public function getUserCollections($args)
  {
    return $this->makeRequest('/v3/market/user/collections');
  }

  public function getPrivateCollection($args)
  {
    return $this->makeRequest('/v3/market/user/collection');
  }

  public function getUsersDetails($username, $args)
  {
    return $this->makeRequest("/v1/market/user:$username.json");
  }

  public function getUsersBadges($username, $args)
  {
    return $this->makeRequest("/v1/market/user-badges:$username.json");
  }

  public function getUsersItems($username, $args)
  {
    return $this->makeRequest("/v1/market/user-items-by-site:$username.json");
  }

  public function getUsersNewItems($username, $site, $args)
  {
    return $this->makeRequest("/v1/market/new-files-from-user:$username,$site.json");
  }

  /**
   * Private user details
   **/

  public function getSales($args)
  {
    return $this->makeRequest('/v3/market/author/sales');
  }

  public function getSaleByCode($args)
  {
    return $this->makeRequest('/v3/market/author/sale');
  }

  public function getPurchases($args)
  {
    return $this->makeRequest('/v3/market/buyer/list-purchases');
  }

  public function getPurchaseByCode($args)
  {
    return $this->makeRequest('/v3/market/buyer/purchase');
  }

  public function getPrivateUserDetails($args)
  {
    return $this->makeRequest('/v1/market/private/user/account.json');
  }

  public function getUsername($args)
  {
    return $this->makeRequest('/v1/market/private/user/username.json');
  }

  public function getEmail($args)
  {
    return $this->makeRequest('/v1/market/private/user/email.json');
  }

  public function getSalesByMonth($args)
  {
    return $this->makeRequest('/v1/market/private/user/earnings-and-sales-by-month.json');
  }

  public function getTotalMarketUsers($args)
  {
    return $this->makeRequest('/v1/market/total-users.json');
  }

  public function getTotalMarketItems($args)
  {
    return $this->makeRequest('/v1/market/total-items.json');
  }

  public function getTotalFilesBySite($site, $args)
  {
    return $this->makeRequest("/v1/market/number-of-files:$site.json");
  }
}
