<?php 

namespace Janssen\Helpers;

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

throw new Exception("hola",500);