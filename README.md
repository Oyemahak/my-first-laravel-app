# Laravel CRUD – Students, Courses, Professors

## What’s implemented
- Students: full CRUD (create, read, update, delete) with validation
- Courses: full CRUD with validation
- Professors: migration + factory + seeder (10 fake names)
- Basic error handling (validation messages) and success flashes
- Simple Bootstrap layout and nav

## Setup
1. Copy `.env` and set DB to your local MySQL (MAMP: host 127.0.0.1, port 8889, user root, pass root)
2. `composer install`
3. `php artisan key:generate`
4. `php artisan migrate:fresh --seed`
5. `php artisan serve` → http://127.0.0.1:8000

## Routes
- `/students` (CRUD)
- `/courses` (CRUD)
- `/professors` (index populated by seeder)