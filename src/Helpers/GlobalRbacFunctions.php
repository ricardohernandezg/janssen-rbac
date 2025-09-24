<?php 

namespace Janssen\Helpers;

use Janssen\App;
use Janssen\Engine\Config;
use Exception;

/**
 * here we should check that 
 * - we are running inside Janssen core,
 * - we have the engine settings or independent file named rbac in Config namespace
 * - we have redis enabled
 * - we have the database for persistence
 * - we have the tables scaffolding or the settings enabled
 */

if (!class_exists('Janssen\App')) {

    throw New \Exception('This package must run inside Janssen App', 500);

} 

// load rbac config
$rbac_conf_candidate = App::getPathCandidate('rbac');
Config::setAll((is_file($rbac_conf_candidate)) ? (include $rbac_conf_candidate) : []);
self::$engine_config = Config::get();

if (!extension_loaded('redis')) {

    throw New \Exception('This package needs Redis to work', 500);

} 