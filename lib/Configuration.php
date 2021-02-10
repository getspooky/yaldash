<?php
/*
 * This file is part of the yaldash  package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

  return [
      /*
     |--------------------------------------------------------------------------
     | Application Name
     |--------------------------------------------------------------------------
     | This value is the name of your application. This value is used when the
     | framework needs to place the application's name in a notification or
     | any other location as required by the application or its packages.
     |
     */
      'name' => 'yaldash',

      /*
       |----------------------------------------------------------------------------
       | Application Logo
       |----------------------------------------------------------------------------
       | This value is the logo of your application. This value is used on Register
       | and Login page.By default, the logo is stored in the published / img folder.
       |
       */
      'logo' => 'logo-128.png',

      /*
      |------------------------------------------------------------------------------
      | Prefix
      |------------------------------------------------------------------------------
      | The prefix method may be used to prefix each route in the group with a given URI
      | By Default Laravel Dashboard use library as prefix for all routes
      |
      |
      */
      'prefix' => '/',

      /*
      |------------------------------------------------------------------------------
      | Route
      |------------------------------------------------------------------------------
      | Here you can customize the name of all routes provided by Laravel Dashboard
      |
      */
      'routes' => [
          'Dashboard', 'Settings', 'Manage', 'JsonManage' , 'Users' , 'Checkout' , 'Store'
      ],

      /*
      |------------------------------------------------------------------------------
      | Middleware
      |------------------------------------------------------------------------------
      | Here you can add your own custom middleware.
      |
      */
      'middleware' => [
         'auth','web'
      ],


      /*
      |------------------------------------------------------------------------------
      | Views
      |------------------------------------------------------------------------------
      | Here you can Modify all your views . By Default Laravel Dashboard
      | Modify just Dashboard view ,
      |
      */
      'views' => [
          'Post' => [
              'intro_post' => 'A place to publish your best work !',
              'desc_post' => 'A place where words matter. LaravelDash taps into the brains of the world\'s most insightful writers and thinkers.'
          ],
          'Store' => [
               'intro_store' => 'Easy Online Shopping‎ !',
               'desc_store' => 'Online shopping for the latest electronics, fashion, phone accessories, computer electronics, toys, home&garden, home appliances, tools, home improvement ...'
          ],
          'Dashboard' => [
              'intro_paragraph' => 'Build Laravel Web Applications faster than ever , Easy to install , Effortless to customize.',
              'intro_button' => 'Learn about what I do',
              'button_link' => '',
              'stuff' => [
                  'title' => "Here's all the stuff I do.",
                  'sub_title' => 'Revolutionize how you build the web.',
                  'first_stuff' => [
                       'icon' => 'icon featured fa fa-diamond',
                       'title' => 'Modern UI',
                       'content' => 'Laravel Dashboard provides a modern, responsive interface that you can be proud to put in front of your users.'
                  ],
                  'second_stuff' => [
                      'icon' => 'icon featured fa-flash',
                      'title' => 'Ridiculously fast',
                      'content' => 'Laravel Dashboard was designed to help developers take applications from concept to completion as quickly as possible.'
                  ],
                  'third_stuff' => [
                      'icon' => 'icon featured fa fa-book',
                      'title' => 'Easy to work with',
                      'content' => 'We have provided detailed documentation as well as specific code examples to help new users get started.'
                  ]
              ]
          ]
      ]
  ];
