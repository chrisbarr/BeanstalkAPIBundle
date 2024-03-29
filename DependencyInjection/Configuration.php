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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
	public function getConfigTreeBuilder()
	{
		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root('beanstalkapi');

		$rootNode
			->children()
			->scalarNode('account')->isRequired()->cannotBeEmpty()->end()
			->scalarNode('username')->isRequired()->cannotBeEmpty()->end()
			->scalarNode('password')->isRequired()->cannotBeEmpty()->end()
			->end();

		return $treeBuilder;
	}
}