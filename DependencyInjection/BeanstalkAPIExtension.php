<?php

/*
 * This file is part of the Beanstalkapp\BeanstalkAPIBundle
 *
 * (c) Chris Barr <chris.barr@ntlworld.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Beanstalkapp\BeanstalkAPIBundle\DependencyInjection;

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
		$loader->load('beanstalk.xml');

		$configuration = new Configuration();
		$processor = new Processor();
		$config = $processor->processConfiguration($configuration, $configs);
		
		foreach (array('account', 'username', 'password') as $attribute) {
			if (isset($config[$attribute])) {
				$container->setParameter('beanstalk_api.'.$attribute, $config[$attribute]);
			}
		}
	}
}