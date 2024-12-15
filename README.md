# ATM Management System - Installation and Configuration

A simple ATM management system built with Laravel.

## ⚙️ Installation

### 1. Clone the project
```bash
git clone https://github.com/nizamializadeh/atm-management-system.git
```
### 2. Install dependencies
```bash
cd atm-management
composer install
```
### 3. Configure environment variables
Copy .env.example to .env and update the necessary values.
###  4. Run migrations
```bash
php artisan migrate
php artisan db:seed
```
### 5. Generate Laravel key
```bash
php artisan key:generate
```
### 6. Start the server
```bash
php artisan serve
```
## 🛠️ API Endpoints
```bash
POST /api/login - User login
```
```bash
DELETE /api/transactions/{id} - Delete transaction
```
```bash
POST /api/accounts/{id}/withdraw - Withdraw from account
```

## 🔑 Authentication
Use the token from /api/login endpoint in the Authorization header.

Example: 
```bash
Authorization: Bearer {token}
```
