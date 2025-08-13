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
- Laravel 12  
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

# 📦 Installation

## 1️⃣ Clone the Repository
```bash
git clone https://github.com/devsynapse/laravue-food-delivery.git
cd laravue-food-delivery
```

## 2️⃣ Backend setup
```bash
cp .env.example .env
composer install
php artisan key:generate
```

### Update your .env file with database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravue_food
DB_USERNAME=username
DB_PASSWORD=password
```

### Run migrations and seed the database:
```bash
php artisan migrate --seed
```

### Start Laravel development server:
```bash
php artisan serve
```

## 3️⃣ Frontend setup
```bash
nvm use
npm install
npm run dev
```

By default, Laravel runs on http://127.0.0.1:8000 and the Vue frontend on http://127.0.0.1:5173

## 🐳 Running with Docker (Optional)
```bash
docker compose up -d
```