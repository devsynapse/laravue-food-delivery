# 🍔 Laravue Food Delivery

A **full-stack food delivery web application** built with **Laravel** (backend) and **Vue.js** (frontend).  
It provides complete functionality for users to browse menu, order food, and for admins to manage orders and menus.

---

## ✨ Features

### 👤 User Features
- Browse menus
- Add items to cart
- Place orders and track status
- View order history

### 🛠 Admin Features
- Manage restaurants and menu items
- View and update orders
- Dashboard analytics

### ⚙ General
- Laravel API + Vue.js SPA
- Authentication & Authorization
- Responsive design
- RESTful API endpoints

---

## 🛠 Tech Stack

**Backend**  
- Laravel 10  
- MySQL 

**Frontend**  
- Vue.js 3  
- Axios
- Tailwind CSS

**Tools**  
- Composer (PHP dependencies)  
- NPM (JS dependencies)  
- Laravel Artisan CLI

---

## 📦 Installation

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/devsynapse/laravue-food-delivery.git
cd laravue-food-delivery
```

### 1️⃣ Backend the Repository
```bash
cp .env.example .env
composer install
php artisan key:generate
```

# Update your .env file with database credentials:
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravue_food
DB_USERNAME=username
DB_PASSWORD=password

# Run migrations and seed the database:
php artisan migrate --seed
