# Dealers Warehouse Assessment

## Setup Instructions

1. Start by pulling down this repo to your local machine. 
2. Create a `.env` file in the project using the `.env.example` file as a starting point
3. Update the `DB_*` env vars to reflect your local database connection. I used a MySQL database during development.
4. Create a database for the project. I called mine "dealers_warehouse_assessment", but you can use whatever you'd like.
5. In a terminal navigate to the project directory.
6. Run `composer install` to install all composer packages and dependencies.
7. Run `php artisan migrate` to create the database tables.
8. Run `php artisan db:seed` to create required database records.
9. Run `php artisan key:generate`.
10. Run `npm install`.
11. Build assets and run the project using one of the below methods.

### Building Assests and Serving Project Using Laravel Valet
Assuming you have [Laravel Valet](https://laravel.com/docs/11.x/valet) installed already. Run either `npm run build` or `npm run dev` then you should be able to navigate to the url named after the project directory. Most likely it will be `http://dealers-warehouse-assessment.test/`.

### Building Assets and Serving Project Using Artisan Serve
In the terminal run `npm run build` then run `php artisan serve`. The serve command will provide a url in the terminal you can navigate to in the browser.

## Database File
If you don't want to run the migrations and seeders to setup the database you can use [this SQL file](https://github.com/dalawhorn/dealers-warehouse-assessment/blob/main/dealers_warehouse_assessment_2024-11-22.sql).

## Potential Issues
If Laravel throws an error after installing related to the app key you may need to run `php artisan key:generate` 