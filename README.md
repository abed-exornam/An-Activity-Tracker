# 📌 Application Support Tracking System  

This is a Laravel-based web application designed to track and manage the daily activities of an Application Support Team. It provides an efficient way to log, update, and report activities, ensuring smooth workflow tracking and accountability.  

## 📋 Features  

✅ **Activity Logging** – Users can input daily activities, including SMS counts and log comparisons.  
✅ **Edit & Update Activities** – Modify activity details, update remarks, and change status.  
✅ **Search** – Find activities by name or status.  
✅ **Daily View** – List all activities for the current day.  
✅ **Reporting** – Generate reports for a specific date range.  
✅ **User Authentication** – Secure login/logout for access control.  

## 🛠️ Installation and Setup  

### 1️⃣ Clone the Repository  

```bash
git clone https://github.com/abed-exornam/An-Activity-Tracker.git
cd "Assignment Laravel"
```

### 2️⃣ Install Dependencies  

```bash
composer install
npm install
```

### 3️⃣ Setup Environment Variables  

- Copy the `.env` file:  

  ```bash
  cp .env.example .env
  ```

- Open `.env` in a text editor and update the **database configuration** to match your XAMPP setup:  

  ```ini
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=your_database_name  # Use the database you created in phpMyAdmin
  DB_USERNAME=root
  DB_PASSWORD=                    # Leave empty if no password is set in XAMPP
  ```

- Generate the application key:  

  ```bash
  php artisan key:generate
  ```

### 4️⃣ Set Up the Database in XAMPP  

1. Start **Apache** and **MySQL** from the XAMPP Control Panel.  
2. Open **phpMyAdmin** (`http://localhost/phpmyadmin/`).  
3. Create a new database (e.g., `activity_tracker`).  
4. Run Laravel migrations to create tables:  

   ```bash
   php artisan migrate --seed
   ```

### 5️⃣ Run the Application  

- Start the Laravel development server:  

  ```bash
  php artisan serve
  ```

- Open **`http://127.0.0.1:8000`** in your browser to access the app.  

## 📂 Project Structure  

```
Assignment Laravel
│── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── ActivityController.php
│   │   │   ├── Auth/
│   │   │   ├── HomeController.php
│   │   ├── Middleware/
│   ├── Models/
│   │   ├── Activity.php
│── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php
│   │   ├── activities/
│   │   │   ├── activities.blade.php
│   │   │   ├── create.blade.php
│   │   │   ├── edit.blade.php
│── routes/
│   ├── web.php
```

## 🔗 Main Pages & Routes  

| **Page**             | **Route**                | **Description**                             |
|----------------------|--------------------------|---------------------------------------------|
| **Activity List**    | `/activities`            | Displays all logged activities              |
| **Add Activity**     | `/activities/create`     | Page to create a new activity               |
| **Edit Activity**    | `/activities/{id}/edit`  | Edit an existing activity                   |
| **Daily View**       | `/daily-activities`      | Shows only today’s logged activities        |
| **Generate Report**  | `/activities/report`     | Generates reports by date range             |

## 📝 Notes  

- The system ensures accurate tracking of SMS counts compared to log values.  
- Users can only modify activities they have access to.  
- Reports help in analyzing trends over time.  

---
