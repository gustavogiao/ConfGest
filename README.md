# 🎤 **ConfGest**

**ConfGest** is a web application built with **Laravel**, designed to explore the **MVC architecture** and gain deeper insight into Laravel’s ecosystem.  
It’s a simple yet complete app for managing **conferences**, **speakers**, and **sponsors**, allowing interaction between **users** and **administrators**.

Beyond the base features, this project stands out for:
- ✅ **Automated testing** with **PEST**, ensuring **95%+ test coverage**
- 🧩 Use of **Form Requests** and **Actions** within controllers for **Clean Code** and clear separation of responsibilities
- 🎨 A modern, elegant interface powered by **Tailwind CSS**
- ⚙️ A modular, easily configurable structure — perfect for learning and experimentation

**Curricular Unit**: Multiplatform Web Development (25/26)

**Institution**: UA - University of Aveiro

---

## 🧭 **Main Features**

- Full CRUD for conferences
- Admin management of **speakers** and **sponsors**
- Public conference listing
- Users can add conferences to their personal attendance list

---

## ⚙️ **Requirements**

- PHP **≥ 8.1**
- **Composer**
- **Node.js** & **npm**
- Database: **SQLite**, **MySQL**, or **PostgreSQL**

---

## 🚀 **Installation**

### 1. Clone the repository
```bash git clone <repo-url> ```

### 2. Navigate into the project directory
```bash cd confgest ```

### 3. Install Composer dependencies
```bash composer install ```

### 4. Copy the example environment file
```bash cp .env.example .env ```

### 5. Generate the application key
```bash php artisan key:generate ```

### 6. Configure the `.env` file with your database credentials

Update your `.env` file with the correct database configuration.  
Below is an example for **PostgreSQL**:

```bash
# Database Configuration
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=confgest_dev
DB_USERNAME=postgres
DB_PASSWORD=your_password

# (Optional) For Docker setups
POSTGRES_USER=postgres
POSTGRES_PASSWORD=your_password 
```

### 7. Run the migrations and seeders
```bash php artisan migrate --seed ```

## 🧑‍💻 **Running the Application**

### 💻 **Using Herd**

### Start the local development server
```bash npm run dev ```

**Access the app at 👉 http://localhost:8000 or http://confgest.test**

### 🐳 **Using Docker**

### 1. Build and start the containers
docker-compose up -d --build

### 2. Run the database migrations
docker exec -it confgest-web-1 php artisan migrate

### 3. Access the container shell (if needed)
docker exec -it confgest-web-1 bash

### 🧩 If you need to rebuild assets (CSS, JS, etc.):
```bash docker-compose exec web npm install && npm run build ```

### 🖼️ **For image storage and file permissions**

Run the following commands to create the symbolic link for storage and ensure the proper permissions:

```bash
php artisan storage:link
chmod -R 755 storage
chmod -R 755 public/storage
```
**Then open 👉 http://localhost:8000**

## **🧪 Testing with PEST**

### Install Pest (if needed)
```bash 
composer require pestphp/pest --dev
php artisan pest:install
```
### Create a new test
```bash 
php artisan make:test TestName --pest
```

### Run all tests
```bash 
php artisan test
```

### Run tests with coverage
```bash 
php artisan test --coverage
```

### Generate an HTML coverage report
```bash 
php artisan test --coverage --coverage-html=coverage
``` 

## **💖 Using Pint**

### Install Pink
```bash
composer require laravel/pint --dev
```

### Run Pink
```bash
php ./vendor/bin/pint
```

### Run tests with Pink
```bash
php artisan test --pint
```

## **Using PHPStan**
### Install PHPStan
```bash
composer require --dev phpstan/phpstan
```
### Run PHPStan
```bash
php vendor/bin/phpstan analyse app/
```

# 🧼 Useful Commands
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
```

# **🧱 Summary**

ConfGest is a minimal yet robust web app — ideal for anyone wanting to understand Laravel’s MVC structure, practice clean development principles, and integrate automated testing into a real-world project.
