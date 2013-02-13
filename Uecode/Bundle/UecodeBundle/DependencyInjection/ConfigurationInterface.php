<?php
/**
 * User: Aaron Scherer
 * Date: 2/13/13
 */
namespace Uecode\Bundle\UecodeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

interface ConfigurationInterface
{
	/**
	 * Append configuration data by reference to the given rootNode
	 *
	 * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $rootNode
	 * @return mixed
	 */
	public function appendTo( ArrayNodeDefinition &$rootNode );
}
