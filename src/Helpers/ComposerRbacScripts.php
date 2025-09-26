<?php 

namespace Janssen\Helpers;

use Composer\Script\Event;
#use Composer\Installer\PackageEvent;

class ComposerScripts
{

    private static $pkg_name = 'ricardohernandezg/janssen-rbac';

    public static function prepareJanssen(Event $e)
    {
        $vendor_dir = $e->getComposer()->getConfig()->get('vendor-dir');
        // check if app directories exists. 
        // If not make the base scaffolding
        $base_dir = $vendor_dir . '/..';
        $sca_dir = $vendor_dir . '/' . self::$pkg_name . '/src/Resource/Scaffolding';
        
        if(!is_dir($base_dir . '/bin'))
            mkdir($base_dir . '/bin');

        copy($sca_dir . '/janssen-rbac.100', $base_dir . '/bin/janssen-rbac.php');

    }
}