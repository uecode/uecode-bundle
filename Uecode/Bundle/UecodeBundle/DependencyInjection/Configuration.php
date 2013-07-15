<?php
/**
 * @author Aaron Scherer
 * @date 10/8/12
 */
namespace Uecode\Bundle\UecodeBundle\DependencyInjection;

use \Uecode\Bundle\UecodeBundle\DependencyInjection\ConfigurationInterface as UecodeConfiguration;
use \Uecode\Bundle\UecodeBundle\Exception\DependencyInjection\InvalidConfigurationException;

use \Symfony\Component\Config\Definition\Builder\TreeBuilder;
use \Symfony\Component\Config\Definition\ConfigurationInterface;

use \Symfony\Component\Yaml\Yaml;

/**
 * Configuration for the  Bundle
 */
class Configuration implements ConfigurationInterface
{
	/**
	 * Related uecode bundles
	 *
	 * @access private
	 */
	private $bundles;

	/**
	 * Set the related uecode bundles
	 *
	 * @access public
	 * @param array $bundles
	 */
	public function setBundles(array $bundles)
	{
		$this->bundles = $bundles;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getConfigTreeBuilder()
	{
		$treeBuilder = new TreeBuilder();
		$rootNode    = $treeBuilder->root( 'uecode' );

		$rootNode
			->children()
			->end();

		foreach( $this->bundles as $bundle ) {
			$name = $bundle.'\\DependencyInjection\\Configuration';

			if (!class_exists($name)) {
				continue;
			}

			$config = new $name;

			if( !( $config instanceof UecodeConfiguration ) ) {

				// Otherwise throw an exception
				throw new InvalidConfigurationException( 'Invalid configuration for '.get_class($config) );
			}

			// Have the config class append (by reference) to the given rootNode
			$config->appendTo( $rootNode );
		}

		return $treeBuilder;
	}

	/**
	 * @return \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition|\Symfony\Component\Config\Definition\Builder\NodeDefinition
	 /
	public function addNode()
	{
		$treeBuilder = new TreeBuilder();
		$rootNode    = $treeBuilder->root( 'gearman' );

		$rootNode
			->children()
				->append( $this->addGearmanClient() )
				->append( $this->addGearmanServer() )
			->end()
		;
		return $rootNode;
	}
	*/
}
