### Frontend
Angular 17.2.0
```
git clone https://github.com/Santhiveerapandi/taskui_angular17.git
cd taskui_angular17
npm install
ng serve
```
### Backend
Laravel 10
```
git clone https://github.com/Santhiveerapandi/student-api.git
cd student-api
cd student
composer install
composer run post-root-package-install
composer run post-create-project-cmd
```
#### .env:file update
DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=taskui

DB_USERNAME=root

DB_PASSWORD=
```
php artisan migrate
php artisan serve
```
