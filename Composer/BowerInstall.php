<?php

namespace Bafford\BowerBundle\Composer;

use Composer\Script\CommandEvent;

class BowerInstall extends \Sensio\Bundle\DistributionBundle\Composer\ScriptHandler
{
    public static function installComponents(CommandEvent $event, $action)
    {
        $options = static::getOptions($event);
        
        $consoleDir = static::getConsoleDir($event, $action);
        if(!$consoleDir) {
            return;
        }
        
        static::executeCommand($event, $consoleDir, "bafford:bower:$action");
    }
    
    public static function postInstall(CommandEvent $event)
    {
        return self::installComponents($event, 'install');
    }
    
    public static function postUpdate(CommandEvent $event)
    {
        return self::installComponents($event, 'update');
    }
}
