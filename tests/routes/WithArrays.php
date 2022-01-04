<?php

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
            return array(

                '' => Route::add('_controller', [])
                ->rule('enum', ['search', 'contact', 'blog', ], [])->default('content', [])
                ->group(function()
                {
                    return array(

                        'search' => Route::add('_query', [])
                        ->rule('path', ['page', ], []),

                        'content' => Route::add('_slug', [])
                        ->rule('enum', ['about-us', 'careers', 'privacy', ], [])->default('index', []),

                        'blog' => Route::add('_action', [])
                        ->rule('enum', ['page', 'post', ], [])->default('page', [])
                        ->group(function()
                        {
                            return array(

                                'page' => Route::add('_page', [])
                                ->rule('format', ['int', ], [])->default('1', []),

                                'post' => Route::add('_id', [])
                                ->rule('id', [], []),

                            );

                        }),

                    );

                }),

            );

        }),

    );

});
