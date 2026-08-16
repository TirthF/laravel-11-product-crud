# Laravel 11 Product CRUD App 📦

Hey! This is a simple Product CRUD (Create, Read, Update, Delete) web app I built during my diploma summer internship while learning **Laravel 11**. It lets you add products with pictures, view them in a list, edit details, and delete them when you don't need them anymore.

I also used **Bootstrap 5** to make the design look clean and easy to use.

---

## What this app does

- ➕ **Add Products**: Add product name, SKU code, price, description, and upload a picture.
- 📋 **View Products**: Shows all products in a nice table with their photos and prices.
- ✏️ **Edit Products**: Update product info or change the image anytime.
- 🗑️ **Delete Products**: Remove a product (and it automatically deletes the old photo from the folder too so it doesn't waste space).
- ✅ **Validation & Alerts**: Shows error messages if you miss a required field, and a green popup alert when something is saved successfully.

---

## Built with

- **PHP** (8.2+)
- **Laravel 11**
- **MySQL** (for database)
- **Bootstrap 5** (for styling)
- **Blade** (HTML templates)

---

## How to run it on your computer

Here is how you can set it up locally:

### 1. Clone this repo
```bash
git clone https://github.com/YOUR_USERNAME/laravel-11-product-crud.git
cd laravel-11-product-crud
```

### 2. Install PHP packages
```bash
composer install
```

### 3. Setup your .env file
Make a copy of the example environment file:
```bash
cp .env.example .env
```
Generate an app key:
```bash
php artisan key:generate
```

### 4. Setup your database
Open the `.env` file in VS Code or Notepad and set your database info:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel11_crud
DB_USERNAME=root
DB_PASSWORD=
```
*(Make sure you have created the database `laravel11_crud` in phpMyAdmin / MySQL first!)*

### 5. Run the migrations
To create the tables in your database, run:
```bash
php artisan migrate
```

### 6. Start the server
```bash
php artisan serve
```

Now open your browser and go to:
👉 **`http://127.0.0.1:8000`**

---

## Routes used in the project

| Method | URL | What it does |
| :--- | :--- | :--- |
| `GET` | `/products` | List all products |
| `GET` | `/products/create` | Open form to add a product |
| `POST` | `/products` | Save new product to database |
| `GET` | `/products/{id}/edit` | Open form to edit a product |
| `PUT` | `/products/{id}` | Update the product |
| `DELETE` | `/products/{id}` | Delete product and remove image |

---

## Notes
Feel free to star ⭐ the repo or use this as a starter template if you are also learning Laravel!
