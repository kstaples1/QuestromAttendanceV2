<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# TO DO 
- Landing page
- output pretty json //return response()->json($options,200 ,[],JSON_PRETTY_PRINT);

- back button on professor and student quiz
- professor quiz

- user preferences
- Side nav bar active class
- mobile
- Ajax load

# Questrom Attendance

The Questrom Attendance app is used so that admins can create classes and professors can make sections for each class and students can take classes and take quizes created by professors.

# Project Layout

The project was make using Laravel which is a framework of PHP and uses a MVC or model view controller framework.

### Controllers
   Controllers are found under App/Http/Controllers and they facilitate the transfer of data from the database (model) and the front end (view).


# Routes

#### /admin
    Controller:
        - location: app/Http/Controllers/dashboard.php
        - function: dashboard@index
        
    File:
        - resources/views/admin/index.blade.php
#### /admin/global
    Controller:
        - location: app/Http/Controllers/admin/globalUserGroupController.php
        - function: globalUserGroupController@index
                
    File:
        - resources/views/admin/userGroup/globalUserGroup.blade.php

#### /admin/global/create
    Controller:
        - location: app/Http/Controllers/admin/globalUserGroupController.php
        - function: globalUserGroupController@create
        
    File:
        - resources/views/admin/userGroup/globalUserCreate.blade.php
        
        
