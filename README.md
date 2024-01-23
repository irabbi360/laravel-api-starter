<h1 align="center">Laravel JWT Rest API Starter</h1>
This repository contains a Laravel 10 with JWT authentication boilerplate
using the [tymon/jwt-auth](https://github.com/tymondesigns/jwt-auth) package.

![Project Image](public/assets/images/24012358-b802da74-2719-4e76-ab61-bf565cb38b99.webp)

[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

## Features
- JWT authentication (login, register, password reset, email verification)
- Profile updating
- Password changing
- Product CRUD

## Installation

1. `cp .env.example .env`
2. `composer install`
3. `php artisan jwt:secret` (generate a secret key that will be used to sign your tokens)
4. `php artisan migrate:fresh --seed`

## Authentication

In order to authenticate, you have to log in using valid credentials. User data and an access token will be returned.
You can use this access token to do subsequent requests to the API.

The access token has a TTL of 1 hour until it expires. The access token should be refreshed within this time window to
avoid becoming unauthenticated.

The access token can be refreshed for two weeks. After that, the user has to log in again.

## Contributing

Feel free to open a pull request if you want to contribute to this project. All contributions / suggestions are
welcome ✨
