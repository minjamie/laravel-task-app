# 1. Laravel Task App

A simple task management application built with Laravel. This project provides basic CRUD functionality for managing tasks, including creating, retrieving, updating, and deleting tasks through a RESTful API.

## Features

- **Create** tasks with a title, description, due date, and completion status.
- **Read** tasks by listing all tasks or fetching a specific task by ID.
- **Update** tasks by modifying their details.
- **Delete** tasks from the database.
- API-based backend for easy integration with frontend applications.

## Technologies Used

- **Laravel 11.x**: A PHP framework for building web applications.
- **PHP 8.1+**: The programming language used for the backend.
- **MySQL**: The database used for storing tasks.
- **Faker**: A library used for generating dummy data in tests and factories.
- **Swagger**: For testing API endpoints.

## Installation

### Prerequisites

- PHP 8.1 or higher
- Composer
- MySQL or MariaDB
- Node.js (optional, for frontend assets)

### Steps

1. Clone this repository:

    ```bash
    git clone https://github.com/minjamie/laravel-task-app.git
    cd laravel-task-app
    ```

2. Install the PHP dependencies:

    ```bash
    composer install
    ```

3. Set up your `.env` file:

    Copy the example environment file to create a new `.env` file:

    ```bash
    cp .env.example .env
    ```

    Update your `.env` file with the appropriate database credentials and other environment settings:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Run database migrations to set up the tables:

    ```bash
    php artisan migrate
    ```

6. (Optional) Seed the database with dummy data:

    ```bash
    php artisan db:seed
    ```

7. (Optional) Compile frontend assets (if applicable):

    ```bash
    npm install
    npm run dev
    ``` 

8. Start the local development server:

    ```bash
    php artisan serve
    ```

    The application should now be accessible at [http://localhost:8000](http://localhost:8000).

# 2. DashBoard     
The dashboard should now be accessible at [dashboard](http://localhost:8000/dashboard)

# 3. API Endpoints

## Swagger API Documentation

You can access the Swagger UI to interact with the API and view the documentation at the following URL:

[Swagger UI](http://localhost:8000/api/documentation)

## API Endpoints

### 1. **Create a Task**

- **URL**: `/tasks`
- **Method**: `POST`
- **Request Body**:
    ```json
    {
        "title": "New Task",
        "description": "Task description",
        "due_date": "2025-01-30",
        "completed": false
    }
    ```
- **Response**:
    - **Status**: `201 Created`
    - **Response Body**:
    ```json
    {
        "id": 1,
        "title": "New Task",
        "description": "Task description",
        "due_date": "2025-01-30",
        "completed": false
    }
    ```

### 2. **Get Tasks**

- **URL**: `/tasks`
- **Method**: `GET`
- **Response**:
    - **Status**: `200 OK`
    - **Response Body**:
    ```json
    [
        {
            "id": 1,
            "title": "New Task",
            "description": "Task description",
            "due_date": "2025-01-30",
            "completed": false
        }
    ]
    ```

### 3. **Update a Task**

- **URL**: `/tasks/{id}`
- **Method**: `PUT`
- **Request Body**:
    ```json
    {
        "title": "Updated Task",
        "description": "Updated description",
        "due_date": "2025-02-01",
        "completed": true
    }
    ```
- **Response**:
    - **Status**: `200 OK`
    - **Response Body**:
    ```json
    {
        "id": 1,
        "title": "Updated Task",
        "description": "Updated description",
        "due_date": "2025-02-01",
        "completed": true
    }
    ```

### 4. **Delete a Task**

- **URL**: `/tasks/{id}`
- **Method**: `DELETE`
- **Response**:
    - **Status**: `204 No Content`

# 4. Running Tests

To run the tests, use the following Artisan command:

```bash
php artisan test
````
