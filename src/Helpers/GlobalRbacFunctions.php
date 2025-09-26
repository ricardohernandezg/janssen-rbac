<?php 

namespace Janssen\Helpers;

use Janssen\App;
use Janssen\Engine\Config;
use Janssen\Engine\Event;
use Exception;

/**
 * here we should check that 
 * x we are running inside Janssen core,
 * x we have the engine settings or independent file named rbac in Config namespace
 * x we have redis enabled
 * - we have the database for persistence and tables scaffolding 
 */

if (!class_exists('Janssen\App')) {

    throw New \Exception('This package must run inside Janssen App', 500);

} 

if (!extension_loaded('redis')) {

    throw New \Exception('This package needs Redis to work', 500);

} 

Event::listen('app.afterinit', function(){
    // set configuration from rbac file
    $rbac_conf_candidate = App::getPathCandidate('rbac');
    Config::append((is_file($rbac_conf_candidate)) ? (include $rbac_conf_candidate) : []);

    // check the database scaffolding


});


