<?php

namespace DC\CRMBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Console\Application;
use Sensio\Bundle\GeneratorBundle\Generator\DoctrineCrudGenerator;
use Symfony\Component\Filesystem\FileSystem;

class DCCRMBundle extends Bundle
{
	/**
	 * Overide the crud generator so we can control the templates it uses when using the console
	 * 
	 * @param  Application $application
	 * @return [type]
	 */
	public function registerCommands(Application $application)
	{
	    $crudCommand = $application->get('generate:doctrine:crud');
	    $generator = new DoctrineCrudGenerator(new FileSystem, __DIR__.'/Resources/skeleton/crud');
	    $crudCommand->setGenerator($generator);

	    parent::registerCommands($application);
	}
}
