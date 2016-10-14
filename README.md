# Workout API

This project was built with Laravel Framework 5.3.

## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

### Official Documentation

Documentation for the framework can be found on [Laravel website](http://laravel.com/docs).

## Install the Project

Clone repository and then do the composer install:

```bash
composer install
```

Configure your ```.env``` file. Do not forget to create a MySQL database and configure it in .env file.

In order to send e-mails with Maildocker service, you will need to configure the mail drive and maildocker keys:

```bash
MAIL_DRIVER=maildocker
MAILDOCKER_API_KEY=__Your_api_key_here__
MAILDOCKER_API_SECRET=__Your_api_secret_here__
```

### Migrations

All the entities and tables are represented by Models and are created in db with Laravel migrations.

There is a database model in the root of this project ```database_model.mwb```. Use the MySQLWorkbench tool to open it.

Models are in:

```
app/
   > Exercise.php
   > ExerciseInstance.php
   > Plan.php
   > PlanDay.php
   > User.php
```

Migrations are in:

```
database/migrations/*
```

Run migrations and Seed (to create a dummy data)

```bash
php artisan migrate:refresh --seed
```

### Routes

All the routes os this api are in ```routes/api.php```.

Real GET examples:

```
http://localhost:8000/api/exercises/
http://localhost:8000/api/plans/
http://localhost:8000/api/users/
```

### Test

Run the serve command:

```bash
php artisan serve
```

## Real example

It was created a DigitalOcean server with Linux-Ngix,Mysql,PHP7 in order to exemplify this project in production:

* Api: [http://workout-api.rlv.me/api/](http://workout-api.rlv.me/api/)
* Frontend: [http://workout.rlv.me/](http://workout.rlv.me/)
