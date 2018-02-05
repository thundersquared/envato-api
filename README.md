
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

Use | Method
--- | ------
**Envato Market Catalog**
Look up a public collection | `$client->getCollection([ 'id' => 1234 ]);`
Look up a single item | `$client->getItem([ 'id' => 1234 ]);`
Search for items | `$client->searchItems([ 'site' => 'codecanyon', 'term' => 'query', ... ]);`
Search for comments | `$client->searchComments([ 'item_id' => '1234', 'term' => 'query', ... ]);`
Popular items by site | `$client->getPopularItems('codecanyon'[, array $args = null ]);`
Categories by site | `$client->getCategories($site[, array $args = null ]);`
Prices for a particular item | `$client->getItemPrices([ 'item_id' => 1234 ]);`
New items by site and category | `$client->getNewItems($site = 'graphicriver', $category = 'graphics'[, array $args = null ]);`
Find featured items | `$client->getFeaturedItems($site = 'graphicriver'[, array $args = null ]);`
Random new items | `$client->getRandomNewFiles($site = 'graphicriver'[, array $args = null ]);`
**User Details**
List all of your collections | `$client->getUserCollections(array $args = null);`
Look up a user's private collection | `$client->getPrivateCollection([ 'id' => 1234 ]);`
User account details | `$client->getUsersDetails($username[, array $args = null ]);`
List a user's badges | `$client->getUsersBadges($username[, array $args = null ]);`
A user's items by site | `$client->getUsersItems($username[, array $args = null ]);`
New items by user | `$client->getUsersNewItems($username = 'collis', $site = 'graphicriver'[, array $args = null ]);`
**Private User Details**
List your sales | `$client->getSales($args);`
Look up sale by code | `$client->getSaleByCode([ 'code' => '123-456-789', ... ]);`
List purchases | `$client->getPurchases([ 'page' => 1, ... ]);`
Look up purchase by code | `$client->getPurchaseByCode([ 'code' => '123-456-789' ]);`
User account details | `$client->getPrivateUserDetails(array $args = null);`
Get a user's username | `$client->getUsername(array $args = null);`
Get a user's email | `$client->getEmail(array $args = null);`
Sales by month | `$client->getSalesByMonth(array $args = null);`
**Envato Market Stats**
Total Envato Market users | `$client->getTotalMarketUsers(array $args = null);`
Total Envato Market items | `$client->getTotalMarketItems(array $args = null);`
Number of files in category | `$client->getTotalFilesBySite($site = 'codecanyon'[, array $args = null ]);`

Find each method signature and details at [https://build.envato.com/api/](https://build.envato.com/api/). All parameters are the same and should be passed as a key-value array as the latest argument of the method.

## License
The code in this repo and used modules are open-sourced software licensed under the [MIT license](LICENSE.md).
