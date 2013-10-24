<?php

namespace MESD\BgProcess\BgProcessBundle;

use Symfony\Component\Console\Application;
use Sensio\Bundle\GeneratorBundle\Generator\DoctrineCrudGenerator;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MESDBgProcessBgProcessBundle extends Bundle
{

    public function registerCommands(Application $application){
        //$crudCommand = $application->get('generate:doctrine:crud');
        //$generator = new DoctrineCrudGenerator(new FileSystem, __DIR__.'/Resources/skeleton/crud');
        //$crudCommand->setGenerator($generator);

        parent::registerCommands($application);
    }

}