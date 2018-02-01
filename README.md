
<p align="center">
  <img src="media/icon@2x.png" width="128" />
  <h3 align="center">envato-api</h3>
  <p align="center">Envato Marketplace API</p>
</p>

## What's different in this package?
Of course there are a lot of similar libraries, but this one should be the simplest and the most complete one of them all—at least that what we hope.

## Tech stack
The API is written in PHP, relies on [Guzzle](https://github.com/guzzle/guzzle) to consume the Envato Marketplace API and that's pretty much it. Heavily inspired by [Node version by Bailey Herbert](https://github.com/baileyherbert/node-envato-api).

## How to use
1. Require the package
   ```
   composer require thundersquared/envato-api
   ```
2. Load composer packages
   ```php
   require_once __DIR__ . '/vendor/autoload.php';
   ```
3. Instantiate the class
   ```php
   $client = new \sqrd\Envato\API('your-personal-token-here', 'optional-user-agent-here');
   ```
   or use a nicer style
   ```php
   use \sqrd\Envato\API as Client;
   $client = new Client('your-personal-token-here', 'optional-user-agent-here');
   ```
3. Use them calls
   ```php
   $client->getCollection($site, $args);
   $client->getItem($site, $args);
   $client->searchItems($site, $args);
   $client->searchComments($site, $args);
   $client->getPopularItems($site, $args);
   $client->getCategories($site, $args);
   $client->getItemPrices($site, $args);
   $client->getNewItems($site, $category, $args);
   $client->getFeaturedItems($site, $args);
   $client->getRandomNewFiles($site, $args);
   $client->getUserCollections($args);
   $client->getPrivateCollection($args);
   $client->getUsersDetails($username, $args);
   $client->getUsersBadges($username, $args);
   $client->getUsersItems($username, $args);
   $client->getUsersNewItems($username, $site, $args);
   $client->getSales($args);
   $client->getSaleByCode($args);
   $client->getPurchases($args);
   $client->getPurchaseByCode($args);
   $client->getPrivateUserDetails($args);
   $client->getUsername($args);
   $client->getEmail($args);
   $client->getSalesByMonth($args);
   $client->getTotalMarketUsers($args);
   $client->getTotalMarketItems($args);
   $client->getTotalFilesBySite($site, $args);
   ```
   Find each method signature and details at [https://build.envato.com/api/](https://build.envato.com/api/). All parameters are the same and should be passed as a key-value array as the latest argument of the method.

## License
The code in this repo and used modules are open-sourced software licensed under the [MIT license](LICENSE.md).
