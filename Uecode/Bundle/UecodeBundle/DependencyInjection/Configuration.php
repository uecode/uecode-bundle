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
	 * {@inheritDoc}
	 */
	public function getConfigTreeBuilder()
	{
		$treeBuilder = new TreeBuilder();
		$rootNode    = $treeBuilder->root( 'uecode' );

		$rootNode
			->children()
			->end();

		// Run through the Uecode bundles that have configs
		$bundleConfig = Yaml::parse( __DIR__ . '/../Resources/config/bundles.yml' );
		$bundles = $bundleConfig[ 'bundles' ];
		foreach( $bundles as $bundle ) {

			// If the user hasn't loaded the bundle, don't load the config
			if( !class_exists( $bundle[ 'config' ] ) ) {
				continue;
			}

			// Create the config and make sure its implementing Uecodes ConfigurationInterface
			$config = new $bundle[ 'config' ]( );
			if( !( $config instanceof UecodeConfiguration ) ) {

				// Otherwise throw an exception
				throw new InvalidConfigurationException( $bundle[ 'config' ] );
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
