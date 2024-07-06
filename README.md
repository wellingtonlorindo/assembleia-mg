# Legislative Assembly of Minas Gerais

This project consumes open data from the Legislative Assembly of the State of Minas Gerais and stores it in an SQLite database.

## Installation

The project is configured to run in a Linux environment. After cloning the project, follow the steps below.

### 1 - Install the Required Libraries

- PHP >= 5.5.9
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- SQLITE 3

For more details, see http://laravel.com/docs/5.1#installation

### 2 - Install Composer

```sh
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
```
For more details, see https://getcomposer.org/download/


### 3 - Install the Project

In the root of the project, make the cria_banco.sh file executable:

```sh
$ chmod +x cria_banco.sh
```

Run the installation process:

```sh
$ composer install --prefer-dist
```

In another terminal tab, you can monitor the process with:

```sh
$ tail -f assembleia/storage/logs/laravel.log
``` 

### 4 - Start the Server and Access the System

Start the server inside the assembleia folder:

```sh
$ php artisan serve
```
Access the home page at http://localhost:8000
