## Laravel and Vue JS Ziro TODO's DEMO

## Requirements

- [Laravel server requirements](https://laravel.com/docs/5.5#server-requirements)
- Laravel 5.5 requires PHP 7.0 or later

## Users are added via tinker

1. git clone https://github.com/aqib026/ziro_todos.git
2. cd ziro_todos
3. composer install
4. make a copy of env.example and set the varaiable accordingly
5. After setting up DB , run php artisan migrate 
6. Use `php artisan tinker` to create a test user:

```
App\User::create(['name' => 'Test User', 'email' => 'test@email.com', 'password' => Hash::make('Password01')])
App\User::create(['name' => 'Test User 2', 'email' => 'test1@email.com', 'password' => Hash::make('Password02')])
App\User::create(['name' => 'Test User 3', 'email' => 'test2@email.com', 'password' => Hash::make('Password03')])
```
