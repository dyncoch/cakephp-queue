# CakePHP Queue Study with Docker

This project is a comprehensive study of the CakePHP queue, set up and running using Docker. It provides a robust environment with services like Nginx, PHP, MySQL, and Mailhog, all containerized and easily manageable.

## Setup & Configuration

The project is structured with Docker Compose, making it straightforward to get up and running. Here's a brief overview of the services:

- **Nginx**: Web server.
- **PHP**: Application runtime.
- **MySQL**: Database service.
- **Mailhog**: Email testing tool.

The configuration is flexible, with environment variables allowing for easy adjustments, such as port settings and database credentials.

## Usage

To get started, ensure you have Docker and Docker Compose installed. Then, navigate to the project directory and run:

\```bash
docker-compose up -d
\```

This will start all the services in detached mode. You can then access the application via your browser.

## References

The Docker setup is inspired by [Laravel Sail](https://laravel.com/docs/sail).

For a deeper dive into Docker and its applications, check out this [video tutorial](https://www.youtube.com/watch?v=uoOb6u3_NU8&t=153s&ab_channel=JamesMcDonald) by JamesMcDonald.
