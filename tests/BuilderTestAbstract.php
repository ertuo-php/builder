<?php

namespace Ertuo\Builder\Tests;

use Ertuo\Route;
use Ertuo\RouteAbstract;
use PHPUnit\Framework\TestCase;

use function file_put_contents;

abstract class BuilderTestAbstract extends TestCase
{
	protected $builderClass;

	function testCompareExportedArrays()
	{
		$original = $this->getRoutes();

		$builderClass = $this->builderClass;
		$builder = new $builderClass;

		file_put_contents(
			$tree = __DIR__
				. '/routes/'
				. substr($builderClass, 21) 
				. '.php',
			$php = $builder->buildTree( $original->toArray() )
			);

		$routes = include $tree;

		$this->assertEquals(
			$original->toArray(),
			$routes->toArray()
		);
	}

	function getRoutes() : RouteAbstract
	{
		return Route::add('_app')
		->rule('enum', ['api', 'admin'])->default('web')
		->group(function ()
		{
			yield '' => Route::add('_locale')
				->rule('enum', ['en', 'de'])->default('en')
			->group(function()
			{
				yield '' => Route::add('_controller')
					->rule('enum', ['search', 'contact', 'blog'])
					->default('content')
				->group(function()
				{
					yield 'search' => Route::add('_query')
						->rule('path', ['page']);

					yield 'content' => Route::add('_slug')
						->rule('enum', ['about-us', 'careers', 'privacy'])
						->default('index');

					yield 'blog' => Route::add('_action')
						->rule('enum', ['page', 'post'])
						->default('page')
					->group(function()
					{
						yield 'page' => Route::add('_page')
							->rule('format', ['int'])
							->default('1');

						yield 'post' => Route::add('_id')
							->rule('id');
					});
				});
			});
		});
	}
}
