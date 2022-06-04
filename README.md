# Test project


## Установка

#### Backend
1. Клонировать проект
2. Перейдите в корневой каталог проекта
3. Установить зависимости Run `composer install`
4. Создать БД
5. Скопируйте `.env.example` в файл `.env` и настройте параметры
6. Миграция БД
    - php artisan migrate;
    - php artisan db:seed
7. php artisan storage:link	
8. Запустите `php artisan serve`, чтобы запустить проект по адресу http://localhost:8000
