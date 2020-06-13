<p align="center">Laravel 7 Boilerplate</p>

## About this abomination

I hate doing auth stuff. If i ever have to do it again i'll burn my computer.

To start with this boilerplate, just download it or use git clone. Make sure your database settings are set in `.env` and execute the following commands:

`php artisan migrate`

`php artisan db:seed`

You can check out the `.env.example` for valid config keys.

## Recommended requirements

- PHP 7.4
- MariaDB 10.2

It might work fine in PHP 7.0 and up. I only tested in 7.4. Same goes for MySQL and Co. Just try and see if your computer explodes.


## Used packages

- [laravel/ui](https://github.com/laravel/ui)
- [spatie/laravel-permission](https://github.com/spatie/laravel-permission)
- [laravelcollective/html](https://github.com/LaravelCollective/html)
- [kyslik/column-sortable](https://github.com/Kyslik/column-sortable)

Many thanks for creating those awesome packages.


## Why? There's already \<insert boilerplate\>!

Yeah, there are many boilerplates out there. Some might be more advanced than this one and some are actually quite interesting. Personally i want a mostly neutral starting point without React, Angular or anything else. The templates have to be as simple as possible, without getting in the way. This way the boilerplate stays truly neutral while still providing with the essential stuff most people need to start. Usually you need a way to login and to check for permissions. Maybe i'll add more things, but i try to avoid unnecessary dependencies.

## FAQ

- How can i confirm deletion of entries?

The delete action requires a checkbox field with the name and id "confirm". A simple helper script that searches for a form with ID "delete" will then ask for confirm. Once the "confirm" checkbox is set to true, it'll delete the entry.

## LICENSE

MIT
