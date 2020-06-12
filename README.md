<p align="center">Laravel 7 Boilerplate</p>

## About this abomination

I hate doing auth stuff. If i ever have to do it again i'll burn my computer.

To start with this boilerplate, just download it or use git clone and start off. It has basic user management and nothing more.


## Used packages

- laravel/ui
- spatie/laravel-permission
- laravelcollective/html


## Why? There's already \<insert boilerplate\>!

Yeah, there are many boilerplates out there. Some might be more advanced than this one and some are actually quite interesting. Personally i want a mostly neutral starting point without React, Angular or anything else. The templates have to be as simple as possible, without getting in the way. This way the boilerplate stays truly neutral while still providing with the essential stuff most people need to start. Usually you need a way to login and to check for permissions. Maybe i'll add more things, but i try to avoid unnecessary dependencies.

## FAQ

- How can i confirm deletion of entries?

The delete action requires a checkbox field with the name and id "confirm" inside a form element called "delete". It's a simple helper script that searches for those names. Once the "confirm" checkbox is set to true, it'll delete the entry.

## LICENSE

MIT
