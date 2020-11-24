## Setup

Clone repository into a web directory. This project requires PHP 7.4 or newer (supports PHP 8 as well). You may choose to run it by running ```php artisan serve```instead.

After installing Composer dependencies, you might need to copy ```env.example``` into ```.env``` and generate a new encryption key using ```php artisan key:generate```.

This project requires some sort of database, tested with MySQL, but in theory runs on others as well. Provide credentials in ```.env```. You need to set up only ```DB``` prefixed variables, You are free to change ```APP``` prefixed variables. Changing other variables will not change the works of this project (unless you create a dependency). 

There are no tests.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
