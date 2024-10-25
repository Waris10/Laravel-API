# RESTful API Documentation

## Overview

This is a RESTful API built with Laravel for managing customers and their invoices. The API provides endpoints for creating, reading, updating(PUT and PATCH), and deleting customer and invoice data.

## Features

- User authentication with Laravel Sanctum
- Role-based access control
- CRUD operations for customers and invoices
- Bulk insertion of invoices
- Input validation and error handling

## Technologies Used

- **Backend Framework:** Laravel 11
- **Database:** MySQL
- **Authentication:** Laravel Sanctum
- **Request Validation:** Form Requests
- **API Documentation:** Swagger/OpenAPI (optional)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Waris10/Laravel-API.git
   cd project
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Copy the `.env.example` file to `.env` and update the database configuration:
   ```bash
   cp .env.example .env
   ```

4. Generate the application key:
   ```bash
   php artisan key:generate
   ```

5. Run migrations:
   ```bash
   php artisan migrate
   ```

6. Seed the database (if you have seeders):
   ```bash
   php artisan db:seed
   ```

## API Endpoints

### Authentication

- **Login**
  - `POST /setup`
  - Request body: `{ "email": "user@example.com", "password": "yourpassword" }`
  
### Customers

- **Get All Customers**
  - `GET /api/v1/customers`

- **Get Customer by ID**
  - `GET /api/v1/customers/{id}`

- **Get Customer by with invoices**
  - `GET /api/v1/customers/{id}?includeInvoices=true`

- **Get Customer by Filtering (all Filtering operators are readily defined in the filter folder files located in the ./app/filters/V1/ directory) "SAME APPLIES TO THE INVOICE"**
  - `GET /api/v1/customers?name[like]=Professor`
  - `GET /api/v1/customers?postalCode[lt]=30000`

- **Create Customer**
  - `POST /api/v1/customers`
  - Request body: `{ "name": "John Doe", "email": "john@example.com", "type": "I", ... }`

- **Update Customer**
  - `PUT /api/v1/customers/{id}`
  - `PATCH /api/v1/customers/{id}`
  - Request body: `{ "name": "John Doe Updated", ... }`

- **Delete Customer**
  - `DELETE /api/v1/customers/{id}`


### Invoices

- **Get All Invoices**
  - `GET /api/v1/invoices`

- **Get Invoice by ID**
  - `GET /api/v1/invoices/{id}`

- **Create Invoice**
  - `POST /api/v1/invoices`
  - Request body: `{ "customer_id": 1, "amount": 15000, "status": "P", "billed_date": "2024-10-01", ... }`

- **Bulk Create Invoices**
  - `POST /api/v1/invoices/bulk`
  - Request body: `[ { "customer_id": 1, "amount": 15000, ... }, { "customer_id": 2, "amount": 20000, ... } ]`

- **Update Invoice**
  - `PUT /api/v1/invoices/{id}`
  - Request body: `{ "amount": 16000, ... }`

- **Delete Invoice**
  - `DELETE /api/v1/invoices/{id}`

## ENJOY!!!
