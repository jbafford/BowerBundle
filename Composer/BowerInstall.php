<?php

namespace Bafford\BowerBundle\Composer;

use Composer\Script\CommandEvent;

class BowerInstall extends \Sensio\Bundle\DistributionBundle\Composer\ScriptHandler
{
    public static function installComponents(CommandEvent $event, $action)
    {
        $options = self::getOptions($event);
        $appDir = $options['symfony-app-dir'];

        if (!is_dir($appDir)) {
            echo 'The symfony-app-dir ('.$appDir.') specified in composer.json was not found in '.getcwd().'.'.PHP_EOL;

            return;
        }
        
        static::executeCommand($event, $appDir, "bafford:bower:$action");
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
