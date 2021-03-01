# Installation

To install, please follow the following sequence of steps.

## Download

Download the project from the following repository

```bash
$ git clone https://github.com/rgarcia18/test-interacpedia.git
```

## .env

Go into the project directory

```bash
$ cd test-interacpedia
```

## Dependencies

To install the project dependencies open the terminal of your choice and enter the following command

```python
$ composer update
```

Key generate

```python
$ php artisan key:generate
```

## Settings of database
At the root of the project, find the .env file, locate the following lines of code and configure the connection with the database.


```python
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test-interacpedia
DB_USERNAME=root
DB_PASSWORD=secrect
```

once the connection with the database is configured, enter the terminal of your choice again and run the migrations and seeder of the project.

Migration

```python
$ php artisan migrate
```

Seeders
```python
$ php artisan db:seed
```

## Configuration Storage
Configure image storage

```python
$ php artisan storage:link
```

## User to login
Use the following credentials to login

```python
User: admin@admin.com
Password: password
```
