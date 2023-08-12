# Project Documentation

Welcome to the project documentation. This document provides essential steps to set up, run, and test the project. Make sure to follow the instructions carefully for a smooth experience.

## Table of Contents
- [Getting Started](#getting-started)
- [Queue Job Processing](#queue-job-processing)
- [Fetching Data from External API](#fetching-data-from-external-api)


## Explaination 
1. Route
    we have used api and web routes
    api route is used for add product for queue job 

    web routes are used for the admin dashboard
    as we have used laravel ui so we have auth::routes in routes

2. Queue
    We have used default database queue for process the product data and save in database
    we have created a job that will be responsible for job process
    there is a method in ProductsController dispatch after validation performed on data we dispatach the job

    we have also used error handling and alos loging data in files

3. Command
   Creating an external command to fetch data and store in table we have use jsonplaceholder for fetching the api data
   it fetches data and then store in dataabse 

## Getting Started

1. **Clone the Project:**

   Begin by cloning the project repository to your local machine:
   ```
   git clone <repository_url>
   ```

2. **Copy `.env` File:**
    or you can use the provided env
   Duplicate the `.env.example` file and rename it to `.env`. Update the necessary environment variables such as database configuration.

3. **Database Setup:**

   Create a new database as specified in your `.env` file. Update the `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` accordingly.

4. **Install Dependencies:**

   Use Composer to install the project dependencies:
   ```
   composer install
   ```
   Install frontend dependencies using npm :
    ```
   npm install
   ```

5. **Generate Application Key:**

   Generate a new application key to ensure security:
   ```
   php artisan key:generate
   ```

6. **Run Migrations:**

   Run database migrations to create the required tables:
   ```
   php artisan migrate
   ```

## Queue Job Processing

1. **Run the Project:**

   Start the development server to run the project:
   ```
   php artisan serve
   ```
  run the api route in postman 
  http://localhost:8000/api/data
2. **Run Queue Worker:**

   Launch the queue worker to process jobs:
   ```
   php artisan queue:work
   ```

3. **Test Queue:**

   Use Postman or another API testing tool to test queue job processing. Make the required API requests and observe the queue worker processing the jobs.

## Fetching Data from External API

1. **Run Command:**

   To fetch data from an external API and populate your database, execute the following command:
   ```
   php artisan fetch:apidata
   ```

2. **Verify Data:**

   Check your database to verify that the fetched data has been successfully stored.

## Admin Panel
1. **Run the Project:**

   Start the development server to run the project:
   ```
   php artisan serve
   ```
2. User Authentication
    Register a new user account by clicking on the "Register" link.

    Log in with the registered user's credentials.

    Explore the Application
    After logging in, you can explore the following features:

    Products: View a list of products and their details.

    Posts: View a list of posts.

    Failed Jobs: View a list of failed jobs and their details.
