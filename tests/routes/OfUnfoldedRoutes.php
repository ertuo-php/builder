<?php

use Ertuo\UnfoldedRoute;

$routes = array (
  'key' => '_app',
  'attributes' => 
  array (
  ),
  'rule' => 
  array (
    0 => 'enum',
    1 => 
    array (
      0 => 'api',
      1 => 'admin',
    ),
    2 => 
    array (
    ),
  ),
  'default' => 
  array (
    0 => 'web',
    1 => 
    array (
    ),
  ),
  'routes' => 
  array (
    '' => 
    array (
      'key' => '_locale',
      'attributes' => 
      array (
      ),
      'rule' => 
      array (
        0 => 'enum',
        1 => 
        array (
          0 => 'en',
          1 => 'de',
        ),
        2 => 
        array (
        ),
      ),
      'default' => 
      array (
        0 => 'en',
        1 => 
        array (
        ),
      ),
      'routes' => 
      array (
        '' => 
        array (
          'key' => '_controller',
          'attributes' => 
          array (
          ),
          'rule' => 
          array (
            0 => 'enum',
            1 => 
            array (
              0 => 'search',
              1 => 'contact',
              2 => 'blog',
            ),
            2 => 
            array (
            ),
          ),
          'default' => 
          array (
            0 => 'content',
            1 => 
            array (
            ),
          ),
          'routes' => 
          array (
            'search' => 
            array (
              'key' => '_query',
              'attributes' => 
              array (
              ),
              'rule' => 
              array (
                0 => 'path',
                1 => 
                array (
                  0 => 'page',
                ),
                2 => 
                array (
                ),
              ),
              'default' => 
              array (
                0 => '',
                1 => 
                array (
                ),
              ),
              'routes' => 
              array (
              ),
            ),
            'content' => 
            array (
              'key' => '_slug',
              'attributes' => 
              array (
              ),
              'rule' => 
              array (
                0 => 'enum',
                1 => 
                array (
                  0 => 'about-us',
                  1 => 'careers',
                  2 => 'privacy',
                ),
                2 => 
                array (
                ),
              ),
              'default' => 
              array (
                0 => 'index',
                1 => 
                array (
                ),
              ),
              'routes' => 
              array (
              ),
            ),
            'blog' => 
            array (
              'key' => '_action',
              'attributes' => 
              array (
              ),
              'rule' => 
              array (
                0 => 'enum',
                1 => 
                array (
                  0 => 'page',
                  1 => 'post',
                ),
                2 => 
                array (
                ),
              ),
              'default' => 
              array (
                0 => 'page',
                1 => 
                array (
                ),
              ),
              'routes' => 
              array (
                'page' => 
                array (
                  'key' => '_page',
                  'attributes' => 
                  array (
                  ),
                  'rule' => 
                  array (
                    0 => 'format',
                    1 => 
                    array (
                      0 => 'int',
                    ),
                    2 => 
                    array (
                    ),
                  ),
                  'default' => 
                  array (
                    0 => '1',
                    1 => 
                    array (
                    ),
                  ),
                  'routes' => 
                  array (
                  ),
                ),
                'post' => 
                array (
                  'key' => '_id',
                  'attributes' => 
                  array (
                  ),
                  'rule' => 
                  array (
                    0 => 'id',
                    1 => 
                    array (
                    ),
                    2 => 
                    array (
                    ),
                  ),
                  'default' => 
                  array (
                    0 => '',
                    1 => 
                    array (
                    ),
                  ),
                  'routes' => 
                  array (
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
    ),
  ),
);

return UnfoldedRoute::fromArray($routes);
