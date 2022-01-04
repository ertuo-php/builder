<?php

namespace Ertuo\Builder;

interface BuilderInterface
{
	/**
	* Generates PHP code with the declaration of Ertuo routes
	*
	* @param array $tree output from {@link Ertuo\ExportInterface::toArray()}
	* @return string
	*/
	function buildTree(array $tree) : string;
}
