<?php
/**
 * @author Aaron Scherer
 * @date 10/8/12
 */
namespace Uecode\Bundle\UecodeBundle\DependencyInjection;

use \Symfony\Component\DependencyInjection\ContainerBuilder;
use \Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use \Symfony\Component\Config\FileLocator;
use \Symfony\Component\DependencyInjection\Loader;
use \Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Uecode  Extension
 */
class UecodeExtension extends Extension
{
	/**
	 * {@inheritdoc}
	 */
	public function load( array $configs, ContainerBuilder $container )
	{
		// save bundles that are in the Uecode namespace
		$kernelBundles = $container->getParameter( 'kernel.bundles' );
		$bundles = array();
		foreach ( $kernelBundles as $kb ) {
			$parts = explode( '\\', $kb );
			$last = array_pop( $parts );
			if ( $parts[0] == 'Uecode' && $last != 'UecodeBundle' ) {
				$bundles[] = implode('\\', $parts);
			}
		}

		$configuration = new Configuration( $container->getParameter( 'kernel.debug' ) );
		$configuration->setBundles($bundles);
		$config = $this->processConfiguration( $configuration, $configs );

		$this->setParameters( $container, $config );

	}

	public function getConfiguration(array $config, ContainerBuilder $container)
	{
		return new Configuration( $container->getParameter( 'kernel.debug' ) );
	}

	private function setParameters( ContainerBuilder $container, array $configs, $prefix = 'uecode' )
	{
		foreach( $configs as $key => $value )
		{
			if( is_array( $value ) )
			{
				$this->setParameters( $container, $configs[ $key ], ltrim( $prefix . '.' . $key, '.' ) );
				$container->setParameter(  ltrim( $prefix . '.' . $key, '.' ), $value );
			}
			else
			{
				$container->setParameter( ltrim( $prefix . '.' . $key, '.' ), $value );
			}
		}
	}
}
