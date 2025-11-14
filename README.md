

# 📌 PHP Form Submission App — README

A simple **PHP Form Submission App** with:

* Clean UI
* Form validation
* Secure DB connection using `.env`
* Works on **Windows (XAMPP)** and **Linux (Apache + MySQL)**
* Easy migration from Windows → Linux

---

# 🧩 1. Prerequisites

This app requires:

* PHP 7+
* Apache
* MySQL Server
* phpMyAdmin (optional)
* Git
* FileZilla (for migrating to Linux)

---

# 🪟 2. Windows — Installation & Prerequisite Checks

## 🔎 2.1 Check if XAMPP is installed

Search **“XAMPP Control Panel”**.
If not installed → download:

[https://www.apachefriends.org](https://www.apachefriends.org)

---

## 🔍 2.2 Check PHP, Apache, MySQL version

Open CMD:

```bash
php -v
mysql -V
```

If commands don’t work → Install XAMPP.

---

## 🛠 2.3 Install XAMPP (if missing)

1. Download & install
2. Open XAMPP Control Panel
3. Start:

* Apache
* MySQL

---

## 🔎 2.4 Verify MySQL & phpMyAdmin

Visit:

```
http://localhost/phpmyadmin
```

### ✔ If phpMyAdmin loads:

MySQL is working properly.

### ❌ If you see an error:

```
mysqli::real_connect(): (HY000/1045)
Access denied for user 'root'@'localhost'
```

→ MySQL password mismatch (fix in next section)

---

## ⚠️ 2.5 Fix MySQL Access Denied Error

Open:

```
C:\xampp\phpMyAdmin\config.inc.php
```

Find:

```php
$cfg['Servers'][$i]['password'] = '';
```

Replace:

```php
$cfg['Servers'][$i]['password'] = 'YOUR_MYSQL_PASSWORD';
```

Restart MySQL → Visit phpMyAdmin again.

---

# 🐧 3. Linux — Installation & Prerequisite Checks

Works on Ubuntu/Debian.

---

## 🔍 3.1 Check if Apache, PHP, MySQL exist

```bash
apache2 -v
php -v
mysql --version
```

---

## 📥 3.2 Install Apache

```bash
sudo apt update && sudo apt upgrade -y
sudo apt install apache2 -y
sudo systemctl enable apache2
sudo systemctl start apache2
```

---

## 📥 3.3 Install PHP

```bash
sudo apt install php php-mysqli php-zip php-curl php-xml -y
php -v
```

---

## 📥 3.4 Install MySQL Server

```bash
sudo apt install mysql-server -y
sudo mysql_secure_installation
```

Test login:

```bash
sudo mysql -u root -p
```

---

## 📥 3.5 Install phpMyAdmin (optional)

```bash
sudo apt install phpmyadmin -y
sudo phpenmod mysqli
sudo systemctl restart apache2
```

Visit:

```
http://localhost/phpmyadmin
```

---

# 💻 4. Clone Project on Windows (Development Phase)

Go to XAMPP `htdocs`:

```
cd C:\xampp\htdocs\
```

Run:

```bash
git clone https://github.com/prathmesh-ghatmal/phpform-app.git
```

---

# 🛠 5. Create `.env` File (Windows)

Inside:

```
phpform-app/.env
```

Add:

```
DB_HOST=localhost
DB_USER=root
DB_PASS=YOUR_PASSWORD
DB_NAME=form_app
```
Replace your password with actual Mysql password

---

# 🗄️ 6. Database Setup on Windows

After Apache and MySQL are running:

1. Open your browser
   👉 Visit:

   ```
   http://localhost/phpmyadmin
   ```

2. If phpMyAdmin loads, good.
   If you see an access/connection error → fix MySQL config as described below.

3. In phpMyAdmin:

   * Click **SQL** tab.
   * Paste the following SQL script:

   ```sql
   CREATE DATABASE form_app;
   USE form_app;

   CREATE TABLE submissions (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL,
       message TEXT NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

4. Click **Go**.
   Your database + table is now created.

---


# ▶️ 7. Run & Test the App on Windows

Start Apache + MySQL → visit:

```
http://localhost/phpform-app/
```

Test full flow:

✔ Form validation
✔ DB insertion
✔ UI layout
✔ Error handling

---

# 🧹 8. Clean Project Before Migration (Windows → Linux)

Before sending project to Linux, delete **only local environment-specific files**:

Inside project folder delete:

```
/vendor/       (if created)
/logs/
/cache/
/node_modules/ (if exists)
.env           (you will create new .env in Linux)
```

Do NOT delete:

✔ PHP files
✔ Database.sql
✔ CSS/JS
✔ README.md

This ensures a clean migration.

---

# 🚚 9. Migrate Project to Linux (Using FileZilla)

## 9.1 Install SSH on Linux

```bash
sudo apt install openssh-server -y
sudo systemctl enable ssh
sudo systemctl start ssh
```

## 9.2 Get Linux IP

```bash
hostname -I
```

## 9.3 Open FileZilla and connect:

* **Host:** Linux IP
* **Username:** your Linux username
* **Password:** your Linux password
* **Port:** 22
* **Protocol:** SFTP

Upload project into:

```
/var/www/html/
```

Then set permissions:

```bash
sudo chown -R $USER:$USER /var/www/html/phpform-app
sudo chmod -R 755 /var/www/html/phpform-app
```

---

# ⚙️ 10. Setting Up App on Linux After Migration

## 10.1 Create new `.env` on Linux

```
phpform-app/.env
```

Add:

```
DB_HOST=localhost
DB_USER=root
DB_PASS=YOUR_LINUX_MYSQL_PASSWORD
DB_NAME=form_app
```
replace your password with actual Mysql password
---

## 10.2 Create Database on Linux


After Apache and MySQL are running:

1. Open your browser
   👉 Visit:

   ```
   http://localhost/phpmyadmin
   ```

2. If phpMyAdmin loads, good.
   If you see an access/connection error → fix MySQL config as described below.

3. In phpMyAdmin:

   * Click **SQL** tab.
   * Paste the following SQL script:

   ```sql
   CREATE DATABASE form_app;
   USE form_app;

   CREATE TABLE submissions (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL,
       message TEXT NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

4. Click **Go**.
   Your database + table is now created.


---

# ▶️ 11. Run the App on Linux

Visit:

```
http://localhost/phpform-app/
```

or via IP:

```
http://YOUR_SERVER_IP/phpform-app/
```

Everything should work as it did on Windows.

---

# 🎉 You're Done — Windows → Linux Migration Complete!

#Additional 

# ⚠️ Troubleshooting: MySQL Won’t Start in XAMPP (Port Conflict)

If MySQL fails to start in XAMPP and you see:

```
Error: MySQL shutdown unexpectedly.
```

or

```
Access denied / port 3306 already in use
```

follow these steps:

---

## 1️⃣ Check if MySQL port 3306 is in use

Open **Command Prompt** (Run as Administrator) and type:

```cmd
netstat -ano | findstr 3306
```

If output shows a process (e.g., PID 6392) listening on port 3306, it means another MySQL server or program is already running.

---

## 2️⃣ Identify the process

```cmd
tasklist | findstr <PID>
```

Example:

```cmd
tasklist | findstr 6392
```

* If it shows **mysqld.exe**, another MySQL instance is running.

---

## 3️⃣ Stop the conflicting MySQL service

1. Press **Windows + R**, type `services.msc`, press Enter.
2. Locate the service named:

   * `MySQL`
   * `MySQL80`
3. Right-click → **Stop**
4. (Optional) Right-click → **Properties** → **Startup type → Manual**

---

## 4️⃣ Kill the process (if needed)

If the service doesn’t stop, run in **CMD (Admin)**:

```cmd
taskkill /PID <PID> /F
```

Example:

```cmd
taskkill /PID 6392 /F
```

---

## 5️⃣ Start MySQL from XAMPP

1. Open **XAMPP Control Panel**
2. Click **Start** next to MySQL

✅ It should start successfully now.

---

## 6️⃣ Alternative: Change MySQL port

If you want to keep the other MySQL running:

1. Open `C:\xampp\mysql\bin\my.ini`
2. Replace all occurrences of `3306` with `3307`
3. Save file → restart MySQL
4. Update your `.env` file:

```
DB_HOST=localhost:3307
```

---

💡 **Tip:** For development, it’s easiest to **stop other MySQL servers** and use XAMPP MySQL on the default port 3306.




