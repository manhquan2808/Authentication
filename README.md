# Task Management - Backend

This document covers the backend implementation for the Task Management application.

## Overview

The backend is built using **Laravel** and provides RESTful APIs for task management functionalities. It includes user authentication and database management.

## Main Features

- **User Authentication**: Utilizes Laravel Sanctum for API authentication, ensuring secure endpoints and session management.
- **RESTful API**: Implements the following API endpoints for task management:
  - **GET /api/tasks**: Retrieve a list of all tasks for the user.
  - **POST /api/tasks**: Create a new task.
  - **PUT /api/tasks/{id}**: Update a specific task.
  - **DELETE /api/tasks/{id}**: Delete a specific task.
- **Database Management**: Uses **MySQL** with schema managed through Laravel migrations.

## Configuration

- **Authentication**: Laravel Sanctum provides tokens for user authentication.
- **Database**: MySQL with configuration settings stored in the `.env` file.

## API Testing

Use Postman to test the API endpoints. Key endpoints include:
- `POST /api/register`: Register a new account.
- `POST /api/login`: Log into the system.
- `GET /api/tasks`: Retrieve the list of tasks.
- `POST /api/tasks`: Create a new task.
- `PUT /api/tasks/{id}`: Update a specific task.
- `DELETE /api/tasks/{id}`: Delete a specific task.
