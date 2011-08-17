<?php

namespace Beanstalkapp\BeanstalkAPI\DependencyInjection;

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