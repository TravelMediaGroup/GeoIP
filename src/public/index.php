<?php
/**
 * This file is part of the GeoIP package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

// change directories to the project root
chdir(dirname(dirname(__DIR__)));

// pull in dependencies
require 'vendor/autoload.php';

use GeoIp2\Database\Reader;
use TravelMediaGroup\GeoIP\Adapter;
use TravelMediaGroup\GeoIP\Server;

// set the default date if necessary
if (date_default_timezone_get() == 'UTC') {
    date_default_timezone_set('America/New_York');
}

// capture any issues with the data
try {
    $reader = new Reader('db/GeoLite2-City.mmdb');
} catch (\InvalidArgumentException $ex) {
    die('Could not read location information.');
} catch (\Exception $ex) {
    die('An unknown error occurred.');
}

// instantiate and run the server
$adapter = new Adapter($reader);
$server = new Server($adapter);

$server->run();

exit;
