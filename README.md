
# Multi-Tenant CRM Application

## Overview

This project is a multi-tenant CRM (Customer Relationship Management) application built with Laravel. Each tenant (user or organization) has its own isolated set of data, including clients and interactions. The application includes user authentication, multi-tenancy, CRUD operations, and basic reporting features.

## Features

- User Authentication
  - Registration/Login: Users can register and log in. Each tenant can manage its own users.
- Client Management
  - CRUD Operations: Users can create, view, update, and delete client records.
  - Client Details: Display detailed information about clients, including their interactions and history.
- Interaction Management
  - CRUD Operations: Users can create, view, update, and delete interactions (e.g., notes, meetings) associated with clients.
- Dashboard
  - Overview: Provides a dashboard with an overview of client data, recent interactions, and key metrics (e.g., number of clients, recent activities).
- Reporting
  - Basic reporting endpoints for generating client-related statistics (e.g., total clients, recent interactions).
- Multi-Tenancy Implementation
  - Data Isolation: Implemented using a shared database with tenant-specific tables.
- Security
  - Tenants cannot access each other's data. Role-based access control within each tenant.
- Validation & Error Handling
  - Robust validation and error handling for user inputs and operations.
- Data Integrity
  - Ensures data consistency and integrity across CRUD operations.

## Installation

### Prerequisites

- PHP >= 7.4
- Composer
- Laravel
- MySQL

### Setup

1. Clone the repository:

   git clone https://github.com/deep2619/multi-tenant-crm.git
   cd multi-tenant-crm

2. Install dependencies:
   composer install

3. Set up the environment file:
   cp .env.example .env

4. Generate an application key:
   php artisan key:generate

5. Configure your database in the `.env` file:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=multi-tenant-crm
   DB_PASSWORD=

6. Run migrations:
   php artisan migrate

7. Seed the database (optional):
   php artisan db:seed

8. Serve the application:
   php artisan serve

## Usage

### User Authentication

- Registration: Navigate to `/register` to create a new user.
- Login: Navigate to `/login` to log in with an existing user.

### Dashboard

- After logging in, users will be redirected to the dashboard at `/dashboard`.

### Client Management

- Navigate to `/clients` to view all clients.
- Use the provided forms to create, update, or delete clients.

### Interaction Management

- Navigate to `/interactions` to view all interactions.
- Use the provided forms to create, update, or delete interactions.

## Multi-Tenancy Implementation

Data isolation between tenants is implemented using a shared database with tenant-specific tables. The `tenant_id` is associated with users, clients, and interactions to ensure data segregation.

## API Endpoints

- User Management
  - Registration: `POST /register`
  - Login: `POST /login`
  - Logout: `POST /logout`
- Client Management
  - List Clients: `GET /clients`
  - Create Client: `POST /clients`
  - View Client: `GET /clients/{id}`
  - Update Client: `PUT /clients/{id}`
  - Delete Client: `DELETE /clients/{id}`
- Interaction Management
  - List Interactions: `GET /interactions`
  - Create Interaction: `POST /interactions`
  - View Interaction: `GET /interactions/{id}`
  - Update Interaction: `PUT /interactions/{id}`
  - Delete Interaction: `DELETE /interactions/{id}`
- Reporting
  - Client Statistics: `GET /report/clients`
  - Recent Interactions: `GET /report/interactions`

## Contributing

Feel free to contribute to this project by creating pull requests or submitting issues. Ensure that your code follows the project's coding standards and includes relevant tests.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Acknowledgements

- [Laravel](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)