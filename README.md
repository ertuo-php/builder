# Ertuo Builders

You can use the "builders" to create the PHP code for the route declaration.
The builders are using as input arrays that are created from `ExportInterface::toArray()`.

```php

use Ertuo\Route;
use Ertuo\Builder\BuilderWithArrays;

$routes = Route::add('_app')->...

$php = (new BuilderWithArrays)->buildTree( $routes->toArray() );
file_put_contents('/somewhere/where/routes/live/routes.php', $php);
```

There are so far several builders:
* `BuilderWithArrays` uses arrays to declare nested routes when using `Route::group()`
* `BuilderWithGenerators` is almost the same, but uses `yield` syntax and generators with `Route::group()`
* `BuilderOfUnfoldedRoutes` instead uses `UnfoldedRoute`

The generated code from `BuilderWithArrays` for the route tree looks something like this:

```php

use Ertuo\Route;

return $routes = Route::add('_app', [])
->rule('enum', ['api', 'admin', ], [])->default('web', [])
->group(function()
{
    return array(

        '' => Route::add('_locale', [])
        ->rule('enum', ['en', 'de', ], [])->default('en', [])
        ->group(function()
        {
            return array( ... );
	})
    );
});	 
```
