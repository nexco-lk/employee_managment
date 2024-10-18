# Project configration

## cloning the project
`git clone https://github.com/nexco-lk/employee_managment.git`

## setup enviroment file
make .env file from .env.example

## setup database in enviroment file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=
```

## install vendor packages
`composer install`

## install node modules
`npm install`

## configuring development enviroment
```
php artisan key:generate
php artisan storage:link
php artisan migrate
php artisan db:seed
```

## starting development server 
`php artisan serve`

## starting vite compiler
`npm run dev`

## default login creadentials 
```
email : admin@example.com
password: password
```
