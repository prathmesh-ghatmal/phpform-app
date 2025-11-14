

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
C:\xampp\htdocs\
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
DB_NAME=phpform_db
```
Replace your password with actual Mysql password

---

# 🗄️ 6. Database Setup on Windows

### Create database:

```sql
CREATE DATABASE phpform_db;
```

### Import SQL file using phpMyAdmin → Import → `database.sql`

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
DB_NAME=phpform_db
```
replace your password with actual Mysql password
---

## 10.2 Create Database on Linux

Login:

```bash
sudo mysql -u root -p
```

Create database:

```sql
CREATE DATABASE phpform_db;
```

---

## 10.3 Import SQL file

Open phpMyAdmin on Linux:

```
http://localhost/phpmyadmin
```

Import → select `database.sql`.

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


