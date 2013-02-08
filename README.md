Symfony  Bundle
============

This bundle is the connector for the uecode

## Installation

1. Add to composer.json under `require`

```
"uecode/uecode-bundle": "dev-master",
```

2. Register in `AppKernel`

``` php
	$bundles = array(
	// ...
	new Uecode\Bundle\UecodeBundle\UecodeBundle()
