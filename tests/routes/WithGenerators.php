<?php

use Ertuo\Route;

return $routes = Route::add('_app', [])
->rule('enum', ['api', 'admin', ], [])->default('web', [])
->group(function()
{

	yield '' => Route::add('_locale', [])
	->rule('enum', ['en', 'de', ], [])->default('en', [])
	->group(function()
	{

		yield '' => Route::add('_controller', [])
		->rule('enum', ['search', 'contact', 'blog', ], [])->default('content', [])
		->group(function()
		{

			yield 'search' => Route::add('_query', [])
			->rule('path', ['page', ], []);

			yield 'content' => Route::add('_slug', [])
			->rule('enum', ['about-us', 'careers', 'privacy', ], [])->default('index', []);

			yield 'blog' => Route::add('_action', [])
			->rule('enum', ['page', 'post', ], [])->default('page', [])
			->group(function()
			{

				yield 'page' => Route::add('_page', [])
				->rule('format', ['int', ], [])->default('1', []);

				yield 'post' => Route::add('_id', [])
				->rule('id', [], []);

			});

		});

	});

});
