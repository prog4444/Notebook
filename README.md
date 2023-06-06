# ![Laravel Example App](logo.png)

[![Build Status](https://img.shields.io/travis/gothinkster/laravel-realworld-example-app/master.svg)](https://travis-ci.org/gothinkster/laravel-realworld-example-app) [![Gitter](https://img.shields.io/gitter/room/realworld-dev/laravel.svg)](https://gitter.im/realworld-dev/laravel) [![GitHub stars](https://img.shields.io/github/stars/gothinkster/laravel-realworld-example-app.svg)](https://github.com/gothinkster/laravel-realworld-example-app/stargazers) [![GitHub license](https://img.shields.io/github/license/gothinkster/laravel-realworld-example-app.svg)](https://raw.githubusercontent.com/gothinkster/laravel-realworld-example-app/master/LICENSE)

> ### Example Laravel codebase containing real world examples (CRUD, auth, advanced patterns and more) that adheres to the [RealWorld] spec and API.

This repo is functionality complete — PRs and issues welcome!

----------

# Getting started

Clone the repository

    git clone https://github.com/prog4444/lessons-programming.git

Switch to the repo folder

    cd laravel

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new JWT authentication secret key

    php artisan jwt:generate

Run the database migrations (Set the database connection in .env before migrating)

    php artisan passport:install
    php artisan migrate
    php artisan db:seed

Start the local development server

Start the local development server

    npm run dev
    php artisan serve

You can now access the server at http://localhost:8000

    http://localhost:8000/api/documentation
    http://localhost:8000/admin

TL;DR command list

    git clone https://github.com/prog4444/laravel.git
    cd laravel
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate 
    
Make sure you set the correct database connection information before running the migrations [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve
