<?php
/**
 * User: Aaron Scherer
 * Date: 2/13/13
 */
namespace Uecode\Bundle\UecodeBundle\Exception;

class InvalidConfigurationException extends \Exception
{
	public function __construct( $class )
	{
		return parent::__construct( sprintf( "%s is not a valid Uecode Configuration file.", $class ) );
	}
}
