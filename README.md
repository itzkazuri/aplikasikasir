# Simple Cashier Application

A web-based cashier application built with the Laravel framework. It provides a simple interface for managing products, users, and transactions, with different roles for administrators and clerks.

## Table of Contents

- [Features](#features)
- [User Roles](#user-roles)
- [Tech Stack](#tech-stack)
- [Installation](#installation)
- [Database Schema](#database-schema)

## Features

- **Authentication**: Secure user login and logout.
- **Product Management**: Admins can create, read, update, and delete products (CRUD).
- **User Management**: Admins can manage user accounts (CRUD).
- **Transaction Management**: Admins can manage sales transactions (CRUD). Clerks can create new transactions.
- **Reporting**: Admins can generate monthly and annual sales reports.
- **Search**: Functionality to search for products, users, and transactions.

## User Roles

The application has two defined user roles:

1.  **Admin**: Has full access to all application features, including user and product management, all transaction operations, and report generation.
2.  **Petugas (Clerk)**: Has limited access. Can view products and create new sales transactions.

## Tech Stack

- **Backend**: PHP 8.2, Laravel 12
- **Frontend**: Blade templates, standard CSS/JS
- **Database**: MySQL
- **Dependencies**:
    - `barryvdh/laravel-dompdf`: For generating PDF reports.
    - `maatwebsite/excel`: (Likely for future Excel export functionality).

## Installation

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/your-username/kasir-sederhana.git
    cd kasir-sederhana
    ```

2.  **Install dependencies:**
    ```bash
    composer install
    npm install
    ```

3.  **Environment Setup:**
    - Copy the example environment file:
      ```bash
      cp .env.example .env
      ```
    - Generate an application key:
      ```bash
      php artisan key:generate
      ```

4.  **Database Setup:**
    - Open the `.env` file and configure your MySQL database connection details (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).
    - Create the database in your MySQL client.
    - Run the database migrations to create the tables:
      ```bash
      php artisan migrate
      ```

5.  **Seed the database (Optional):**
    - If you want to populate the database with initial data:
      ```bash
      php artisan db:seed
      ```

6.  **Run the development server:**
    ```bash
    php artisan serve
    ```
    The application will be available at `http://127.0.0.1:8000`.

## Database Schema

The application uses the following main tables:

-   `users`: Stores user information (`username`, `password`, `role`, etc.).
-   `barang`: Stores product information (`kode_barang`, `nama_barang`, `harga`, `stok`, etc.).
-   `transaksi`: Stores main transaction data (`kode_transaksi`, `user_id`, `total_bayar`, etc.).
-   `detail_transaksi`: Stores the individual items for each transaction, linking `transaksi` and `barang`.