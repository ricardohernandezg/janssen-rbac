<?php 

namespace Janssen\Helpers;

use Janssen\App;
use Janssen\Engine\Config;
use Janssen\Engine\Event;
use Janssen\Helpers\Database;
use Exception;

/**
 * here we should check that 
 * x we are running inside Janssen core,
 * x we have the engine settings or independent file named rbac in Config namespace
 * x we have redis enabled
 * x we have the database for persistence and tables scaffolding 
 */

if (!class_exists('Janssen\App')) {

    throw New \Exception('This package must run inside Janssen App', 500);

} 

if (!extension_loaded('redis')) {

    throw New \Exception('RBAC needs Redis to work', 500);

} 

Event::listen('app.afterinit', function(){
    // set configuration from rbac file
    $rbac_conf_candidate = App::getPathCandidate('rbac');
    Config::append((is_file($rbac_conf_candidate)) ? (include $rbac_conf_candidate) : []);

    // check the database scaffolding

    // read from config the names of tables. The schema should come in the general settings

    // look for table roles
    $te = Database::getAdaptor()->tableExists('roles');

    if(!$te)
        throw new Exception('RBAC needs the Roles table');

    // look for table modules
    $te = Database::getAdaptor()->tableExists('modules');

    if(!$te)
        throw new Exception('RBAC needs the Modules table');

    // look for table permisology
    $te = Database::getAdaptor()->tableExists('permisology');

    if(!$te)
        throw new Exception('RBAC needs the Permisology table');


});


