<?php
/**
 * User: Aaron Scherer
 * Date: 2/13/13
 */
namespace Uecode\Bundle\UecodeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

interface ConfigurationInterface
{
	public function appendTo( ArrayNodeDefinition &$rootNode );
}
