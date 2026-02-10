# Laundry Online - Malang

A web-based laundry service platform built with Laravel 12 for the Malang area.

## Features

### User Roles
- **Admin**: Manage users, laundry services, orders, and system settings
- **Penjual (Seller)**: Manage laundry shop, packages, and order processing
- **Pembeli (Buyer)**: Browse services, place orders, and track history

### Core Functionality
- Online laundry service booking
- Multiple laundry packages with pricing
- Order tracking and history
- User authentication and role management
- Shop management for laundry service providers
- Admin dashboard for system oversight

## Tech Stack

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Bootstrap, jQuery, Line Icons
- **Database**: MySQL (Laravel Eloquent ORM)
- **Authentication**: Laravel Breeze

## Project Structure

```
app/Models/
├── User.php          # Base user model with role field
├── Admin.php         # Admin profile model
├── Penjual.php       # Seller profile model
├── Pembeli.php       # Buyer profile model
├── Paket.php         # Laundry package model
├── Toko.php          # Shop model
└── Riwayat.php       # Order history model

app/Http/Controllers/
├── AdminController.php
├── PenjualController.php
├── PembeliController.php
├── UmumController.php
└── Auth/             # Authentication controllers

resources/views/
├── layouts/         # Layout templates
├── auth/            # Authentication views
├── laundry/         # Role-specific views
└── index.blade.php  # Landing page
```

## Installation

1. Clone the repository
2. Install dependencies: `composer install`
3. Copy environment file: `cp .env.example .env`
4. Generate app key: `php artisan key:generate`
5. Configure database in `.env`
6. Run migrations: `php artisan migrate`
7. Start development server: `php artisan serve`

## Usage

- **Landing Page**: Browse services and register
- **Admin**: Access `/admin` for system management
- **Sellers**: Manage shop at `/penjual`
- **Buyers**: Place orders at `/pembeli`

## Database Schema

- **users**: Base user table with role field
- **admins**: Admin profiles
- **penjuals**: Seller profiles
- **pembelis**: Buyer profiles
- **tokos**: Laundry shop information
- **pakets**: Laundry service packages
- **riwayats**: Order history

## License

MIT License - Built for educational purposes by Kelompok 10, Universitas Negeri Malang
