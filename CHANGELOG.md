## Release Notes

- Version 3.1.0

  - Added Laravel 8 Support
  - Fixed `php artisan laraveldash:install` command
  - Fixed `App\User` to `config('auth.providers.users.model', App\Models\User::class)` in all references
  - Bug minor fixes

- Version 3.0.0

  - Support laravel 8
  - Fix views namespace bug
  - Refcatoring code source
  - Ignore published folder
  - Rename `laravelDash` to `yaldash`

- Version 2.0.3

  - Fix views namespace bug

- Version 2.0.2

  - Compile Js and Sass files
  - Install new version of vue-stripe-elements-plus
  - Fix Stripe component

- Version 2.0.1

  - Add laravelDash documentation website
  - Remove .gitignore file from published directory

- Version 2.0

  - Fix validation for array elements
  - Added Laravel 7 support
  - Fix models not returning save result
  - Big refactoring

- Version 1.0
  - Laravel 5.4 support
  - Add Vue2Editor Integration
  - Add Stripe Checkout
