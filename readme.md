## Laravel and Vue JS Ziro TODO's DEMO

## Requirements

- [Laravel server requirements](https://laravel.com/docs/5.5#server-requirements)
- Laravel 5.5 requires PHP 7.0 or later

## Users are added via tinker

1. Use `php artisan tinker` to create a test user:

```
App\User::create(['name' => 'Test User', 'email' => 'test@email.com', 'password' => Hash::make('Password01')])
App\User::create(['name' => 'Test User 2', 'email' => 'test1@email.com', 'password' => Hash::make('Password02')])
App\User::create(['name' => 'Test User 3', 'email' => 'test2@email.com', 'password' => Hash::make('Password03')])
```
