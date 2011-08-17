<?php

namespace Beanstalkapp\BeanstalkAPI\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;

class BeanstalkAPIExtension extends Extension
{
	public function load(array $configs, ContainerBuilder $container)
	{
		$loader = new XmlFileLoader($container, new FileLocator(array(__DIR__.'/../Resources/config')));
		$loader->load('config.xml');

		$configuration = new Configuration();
		$processor = new Processor();
		$config = $processor->processConfiguration($configuration, $configs);
	}
}