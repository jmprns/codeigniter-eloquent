<p align="center">
    <img src="https://cdn.freebiesupply.com/logos/large/2x/codeigniter-logo-svg-vector.svg" width="200" height="200">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" width="200" height="200">
</p>

## About

This repository contains the CodeIgniter framework integrated with Illuminate Database (Eloquent ORM) which Laravel framework used. 

## Codeigniter

CodeIgniter is an Application Development Framework - a toolkit - for people who build web sites using PHP. Its goal is to enable you to develop projects much faster than you could if you were writing code from scratch, by providing a rich set of libraries for commonly needed tasks, as well as a simple interface and logical structure to access these libraries. CodeIgniter lets you creatively focus on your project by minimizing the amount of code needed for a given task.

## Illuminate Database

The Illuminate Database component is a full database toolkit for PHP, providing an expressive query builder, ActiveRecord style ORM, and schema builder. It currently supports MySQL, Postgres, SQL Server, and SQLite. It also serves as the database layer of the Laravel PHP framework.

## Installation

```sh
$ git clone https://github.com/jmprns/codeigniter-eloquent.git
$ cd codeigniter-eloquent
$ composer install
```

## Setting Up

First, go to the `application/config/database.php` to update your database credentials.

```PHP
$eloquent['db'] = array(
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => '',
        'username'  => '',
        'password'  => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => ''
    );
```
You need to autoload the database library to instantiate the capsule manager. Go to the `application/config/autoload.php` and type the `database` in the array to look like this:

```PHP
$autoload['libraries'] = array('database');
```

## Model

To set up the model, you can also autoload the model to access it without using the `use path\to\model` method. The model should extend the eloquent class.

```PHP
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Test extends Eloquent
{
    protected $guarded = [];
    protected $table = "test";
    public $timestamps = false;

}
```

## Guides

For guides and manual of the Eloquent, you can go to the [Laravel Eloquent](https://laravel.com/docs/5.8/eloquent).




