<?php

namespace Ertuo\Builder;

use Ertuo\Builder\BuilderInterface;
use Ertuo\UnfoldedRoute;

use function var_export;

class BuilderOfUnfoldedRoutes implements BuilderInterface
{
	/**
	* @see Ertuo\Builder\BuilderInterface::buildTree()
	*/
	function buildTree(array $tree) : string
	{
		$php = '<?php'
		. "\n"
		. "\n" . "use Ertuo\UnfoldedRoute;"
		. "\n"
		. "\n" . '$routes = ' . var_export($tree, true) . ';'
		. "\n"
		. "\n" . 'return UnfoldedRoute::fromArray($routes);'
		. "\n";

		return $php;
	}
}
