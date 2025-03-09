# Installation
## How to Run the Application (Pull docker image)
1. Copy ```.env.example``` and rename it to ```.env```.
2. Configure the database username and password in the ```.env``` file.
3. Run the command ```composer install```
4. Run the command ```php artisan key:generate```
5. Docker login in cli or other terminal
6. Run the command ```docker pull najibalimudin/sipta-app:dev```
7. Run the command ```docker compose up -d```
8. The application can be accessed at ```127.0.0.1:8000```
9. You don't need to recreate container if you had a changes. It'll update automatically

Note: If you don't want to run the seeder because it will replace your existing data in MySQL, simply set ```RUN_SEEDER=false``` in the ```.env``` file.

## How to Run the Application (Build docker image)
1. Copy ```.env.example``` and rename it to ```.env```.
2. Configure the database username and password in the ```.env``` file.
3. Run the command ```php artisan key:generate```
4. Run the command ```composer install```
5. Uncomment the ```build``` key mapping
6. Comment out the ```image``` key mapping
7. Run the command ```docker compose up --build -d```
8. The application can be accessed at ```127.0.0.1:8000```
9. You don't need to recreate container if you had a changes. It'll update automatically

Note: If you don't want to run the seeder because it will replace your existing data in MySQL, simply set ```RUN_SEEDER=false``` in the ```.env``` file.

## How to Create a Module
1. Run the command php artisan make:modul ModulName.
2. Inside every module, you will find:
    - Routes
    - Controller
    - Views

## Database Table and Seeder Configuration
1. run command ```docker exec -it sipta-app-dev php artisan db:wipe --force``` (Drop Current Database)
2. run command ```docker exec -it sipta-app-dev php artisan artisan:migrate --seed --force```

<br>
<br>


# Technology are Used
## Documentation of AdminLTE Template Usage
- https://jeroennoten.github.io/Laravel-AdminLTE/sections/overview/usage.html
- config on : config/adminlte.php
  
## Spatie Response Cache
- https://github.com/spatie/laravel-responsecache 
- https://www.tiktok.com/@yogameleniawan/photo/7467150735872937223 

## Logging
- Laravel Observer

## Authentication
- Laravel Fortify
