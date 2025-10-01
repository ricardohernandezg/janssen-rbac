<?php 

namespace Janssen\Helpers;

use Janssen\Engine\Request;

class Rbac
{

    public static function userTypeCan($module, $action = null)
    {
        return false;
    }

    public static function userRoleCan($module, $action = null)
    {
        return false;
    }

    public static function userCan($module, $action = null)
    {
        return false;
    }

}