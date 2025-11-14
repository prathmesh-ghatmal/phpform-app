

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
* Composer (for `.env` handling)

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

* If phpMyAdmin loads → MySQL is working.
* If access error → fix MySQL password in `config.inc.php` as described below.

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

```bash
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

---

# 🗄️ 6. Database Setup on Windows

After Apache and MySQL are running:

1. Open your browser → `http://localhost/phpmyadmin`
2. Click **SQL** tab → paste:

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

3. Click **Go** → database + table created.

---

# ▶️ 7. Run & Test the App on Windows

Visit:

```
http://localhost/phpform-app/
```

Test full flow: form validation, DB insertion, UI, and error handling.

---

# 🧹 8. Clean Project Before Migration (Windows → Linux)

Delete **local environment-specific files**:

```
/vendor/
/logs/
/cache/
/node_modules/
/.env
```

Keep: PHP files, SQL, CSS/JS, README.md.

---

# 🚚 9. Migrate Project to Linux (Using FileZilla)

## 9.1 Upload to Home Directory First

1. Connect to Linux via FileZilla (SFTP):

   * Host: Linux IP
   * Username: `imcc`
   * Password: your Linux password
   * Port: 22

2. Upload project into your home folder:

```
/home/imcc/phpform-app
```

---

## 9.2 Move Project to `/var/www/html`

SSH into Linux:

```bash
cd /home/imcc
sudo mv phpform-app /var/www/html/
sudo chown -R www-data:www-data /var/www/html/phpform-app
sudo chmod -R 755 /var/www/html/phpform-app
```

* Now the project is accessible via Apache.

---

# ⚙️ 10. Setting Up App on Linux After Migration

## 10.1 Create new `.env` on Linux

```
/var/www/html/phpform-app/.env
```

```
DB_HOST=localhost
DB_USER=root
DB_PASS=YOUR_LINUX_MYSQL_PASSWORD
DB_NAME=form_app
```

---

## 10.2 Database Setup on Linux

1. Open `http://localhost/phpmyadmin`
2. SQL tab → paste:

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

3. Click **Go** → database + table ready.

---

# ▶️ 11. Run the App on Linux

Visit:

```
http://localhost/phpform-app/
```

or

```
http://YOUR_SERVER_IP/phpform-app/
```

---

# ⚠️ Troubleshooting: MySQL Won’t Start in XAMPP (Port Conflict)

1. Check port:

```cmd
netstat -ano | findstr 3306
```

2. Identify process:

```cmd
tasklist | findstr <PID>
```

3. Stop conflicting MySQL service via `services.msc` or:

```cmd
taskkill /PID <PID> /F
```

4. Start XAMPP MySQL
5. Or change XAMPP MySQL port to `3307` → update `.env`

---

# 🎉 Done — Windows → Linux Migration Complete!

sudo apt update
sudo apt install php-cli unzip curl -y
cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
composer --version
composer require vlucas/phpdotenv


