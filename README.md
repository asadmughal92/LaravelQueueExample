                            Project Documentation
---------------------------------------------------------------------------
First of all because we are using sanctum for securing our application 

First Clone the Project and copy the env file
create the database and set database 

now run Composer install for installing Packaages

then run
php artisan key:generate

after that run migrations
php artisan migrate

----------------------------Queue Job Processing--------------------------------
Run the Project using 
php artisan serve

Run the Queue Worker using
php artisan queue:work


now run the api in the postman to test the working of the Queue

----------------------------Fetching Data from External API-----------------------
For fetching the data from external api we have createa a command 
you can run this command by using
php artisan fetch:apidata

after running this command you will be able to see that your table has been filled data


