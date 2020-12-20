# Cube
##### Let's start writing test for your laravel application!

In this repository I am trying to show how we can start writing Test (__Unit Test__, __Integration Test__) for our __Laravel__ application.

### Installation

The project is already dockerized, so you can just clone the project and build the containers by the following commands.
```sh
$ docker-compose up -d
```

This command will build the and up the containers. then you need to go to the container and run this commands

```sh
$ composer install
$ php artisan migrate
```

### Running Tests
You can simply run the following command to check wethear the tests are passed or not.

Second Tab:
```sh
$ vendor/bin/phpunit --filter .
```
And you can run this command to check the test coverage

```sh
$ vendor/bin/phpunit --filter . --coverage-text
```
